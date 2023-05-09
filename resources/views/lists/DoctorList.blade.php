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
                            <th scope="col">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($doctors as $doctor)
                            <tr>
                                <th scope="row">{{ $doctor->id }}</th>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->email }}</td>

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
