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
                <form method="POST" action="{{ route('storeDoctorAccount') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="subtitle">username:</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="subtitle">password:</label>
                        <input type="text" class="form-control" name="password" />
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

