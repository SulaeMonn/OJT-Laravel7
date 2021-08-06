@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="h4">Upload CSV File</p>
        <div id="dropzone" style="background: #e3e6ff;
                    border-radius: 13px;
                    max-width: 550px;
                    margin-left: auto;
                    margin-right: auto;
                    border: 2px dotted #1833FF;
                    margin-top: 50px;">
            <form action="{{ route('import') }}" class="dropzone" id="file-upload" enctype="multipart/form-data">
                @csrf
                <div class="dz-message">
                    Drag and Drop Single/Multiple Files Here<br>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        Dropzone.options.dropzone = {
            maxFilesize: 12,
            resizeQuality: 1.0,
            acceptedFiles: ".xls",
            addRemoveLinks: true,
            timeout: 60000,
            removedfile: function(file) {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{ url('files/destroy') }}',
                    data: {
                        filename: name
                    },
                    success: function(data) {
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function(file, response) {
                console.log(response);
            },
            error: function(file, response) {
                return false;
            }
        };
    </script>
@endsection
