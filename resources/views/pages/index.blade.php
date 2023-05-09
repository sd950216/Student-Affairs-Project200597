@extends("layouts.app")
@section('content')



    @if(session('success'))
        <div class="alert alert-success"  style="margin-top: 10%">
            <h1 >{{ session('success') }} </h1>
        </div>
    @endif

@endsection

