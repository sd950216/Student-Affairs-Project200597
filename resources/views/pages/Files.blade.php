@extends("layouts.app")
@section('content')
    <div class="container">
<form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
    @csrf
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
</form>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script>
    Dropzone.options.myDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 6, // MB
        acceptedFiles: ".pdf,.doc,.docx",
        dictDefaultMessage: `<img src="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_1280.png" width="200px" alt="upload-img-pic"><br><br> Click or drop files here to upload`,
    };
</script>

@endsection
