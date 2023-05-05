@extends("layouts.master")
@section('content')


    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('img/edit-bg.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>New Post</h1>
                        <span class="subheading">You're going to make a great blog post!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form method="POST" action="{{ route('storeStudentSubject') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Choose a subject:</label>
                        <select id="name" name="name">
                            @foreach($subjects as $subject)

                            <option value="{{$subject->name}}">{{$subject->name}}</option>
                            @endforeach

                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

