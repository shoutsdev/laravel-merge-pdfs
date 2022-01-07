<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Laravel 8 Merge Multiple Pdf into One</h2>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form method="post" action="{{route('file')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="filenames[]" class="myfrm form-control" multiple>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            @if(file_exists(public_path('merged-pdf.pdf')))
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1</th>
                        <th>merged-pdf.pdf</th>
                        <th><a href="{{ asset('merged-pdf.pdf') }}" class="btn btn-primary" download="merged_pdf.pdf">Download</a></th>
                    </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
</body>
</html>
