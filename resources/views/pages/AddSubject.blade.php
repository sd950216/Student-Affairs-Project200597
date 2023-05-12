@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('message'))
                    <div class="alert alert-danger" >
                        <h1 >{{ session('message') }} </h1>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Add Subject </div>

                    <div class="card-body">
                <form method="POST" action="{{ route('storeSubject') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" style="margin-top: 5px;">name:</label>
                        <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" maxlength="20">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="code">code:</label>
                        <input type="text" name="code" id="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" value="{{ old('code') }}" maxlength="10">
                        @if ($errors->has('code'))
                            <div class="invalid-feedback">
                                {{ $errors->first('code') }}
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="name">Choose a department:</label>
                        <select id="name" name="department" style="padding: 4px;
  border-radius: 4px;
  border: 1px solid #ccc;
  font-size: 16px;" >
                            @foreach($departments as $department)

                                <option value="{{$department->name}}">{{$department->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prerequisites">prerequisites:</label>
                        <input id="prerequisites" type="text" class="form-control" name="prerequisites" value="{{ old('prerequisites') }}" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

        </div>
    </div>


@endsection

