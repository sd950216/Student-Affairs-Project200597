@extends("layouts.app")
@section('content')

<div class="container">
    <div class="row pt-2">
        <div class="col ps-4">
            <h1 class="display-6 mb-3">
                <i class="bi bi-person-lines-fill"></i> Student List
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Student List</li>
                </ol>
            </nav>
            <div class="mb-4 mt-4">
                <div class="bg-white border shadow-sm p-3 mt-4">
                    <form method="POST" action="/updateStatus">
                        @csrf
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Academic Number</th>
                            @if(Auth::user()->role == 'doctor')
                                <th scope="col">Status </th>
                                <th scope="col">Action </th>
                            @endif


                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $key => $student)

                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->AcademicNumber }}</td>
                                @if(Auth::user()->role == 'doctor')
                                    <td>{{ $student->status }}</td>
                                    <td><input type="checkbox" name="items[]" value="{{$student->id}}"></td>
                                @endif


                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                        @if(Auth::user()->role == 'doctor')
                            <button class="btn btn-primary" type="submit" name="Succeeded">Succeeded</button>
                            <button class="btn btn-danger" type="submit" name="Failed">Failed</button>
                        @endif

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
