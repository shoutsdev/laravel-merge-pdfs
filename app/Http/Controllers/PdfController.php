<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class PdfController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'filenames' => 'required',
            'filenames.*' => 'mimes:pdf'
        ]);

        $files = [];

        foreach ($request->file('filenames') as $key => $value) {
            $files[] =$value->getPathName();
        }

        $fpdi = new FPDI;
        foreach ($files as $file) {
            $filename = $file;
            $count = $fpdi->setSourceFile($filename);
            for ($i = 1; $i <= $count; $i++) {
                $template = $fpdi->importPage($i);
                $size = $fpdi->getTemplateSize($template);
                $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
                $fpdi->useTemplate($template);
            }

        }
        $fpdi->Output(public_path('/merged-pdf.pdf'), 'F');


        return back()->with('message' , 'File Merged Successfully');
    }
}
