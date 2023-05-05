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
                <form method="POST" action="{{ route('storeSubject') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">name:</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="code">code:</label>
                        <input type="text" class="form-control" name="code" />
                    </div>
                    <div class="form-group">
                        <label for="department">department:</label>
                        <input type="text" class="form-control" name="department" />
                    </div>
                    <div class="form-group">
                        <label for="prerequisites">prerequisites:</label>
                        <input type="text" class="form-control" name="prerequisites" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

