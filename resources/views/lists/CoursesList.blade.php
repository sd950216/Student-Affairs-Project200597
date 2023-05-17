@extends("layouts.app")
@section('content')

<div class="container">
    <div class="row pt-2">
        <div class="col ps-4">
            <h1 class="display-6 mb-3">
                <i class="bi bi-person-lines-fill"></i> Course List
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Course List</li>
                </ol>
            </nav>
            <div class="mb-4 mt-4">
                <div class="bg-white border shadow-sm p-3 mt-4">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            @if (Auth::check() && Auth::user()->role == 'doctor')
                                <th scope="col">Code</th>
                                <th scope="col">Absence File</th>
                            @endif


                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <th scope="row">{{ $course->id }}</th>
                                <td>{{ $course->name }}</td>
                                <td style="display: table-cell; text-align: center;">{{ $course->department }}</td>
                            @if (Auth::check() && Auth::user()->role == 'doctor')
                                    <td style="display: table-cell; text-align: center;">{{ $course->code }}</td>
                                    <td><a href="/GenerateAbsence/{{$course->name}}" style="text-decoration: none; font-size: 16px; color: black">{{ $course->name }}.pdf</a></td>
                            @endif
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
