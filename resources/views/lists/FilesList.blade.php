@extends("layouts.app")
@section('content')

<div class="container">
    <div class="row pt-2">
        <div class="col ps-4">
            <h1 class="display-6 mb-3">
                <i class="bi bi-person-lines-fill"></i> Doctor List
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Doctor List</li>
                </ol>
            </nav>
            <div class="mb-4 mt-4">
                <div class="bg-white border shadow-sm p-3 mt-4">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Course</th>

                            <th scope="col">Link</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($files as $key => $file)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $file->name }}</td>
                                <td>{{ $file->course }}</td>

                                <td><a href="/files/{{$file->name}}" style="text-decoration: none; font-size: 16px; color: black">{{ $file->name }}</a></td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
