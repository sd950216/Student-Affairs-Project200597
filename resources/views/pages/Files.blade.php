//dropzone css
@extends("layouts.app")
@section('content')
//form
<form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
    @csrf
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
</form>


//script
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script>
    Dropzone.options.myDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 6, // MB
        acceptedFiles: ".pdf,.doc,.docx",
        dictDefaultMessage: `<img src="https://w7.pngwing.com/pngs/730/348/png-transparent-computer-icons-upload-icon-upload-miscellaneous-angle-rectangle-thumbnail.png"><br><br> Click or drop files here to upload`,
    };
</script>

@endsection
