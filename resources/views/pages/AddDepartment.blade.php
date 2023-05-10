@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Department </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('storeDepartment') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" style="margin-top: 5px;">name:</label>
                                <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" maxlength="10">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="code">Department Code</label>
                                <input type="text" name="code" id="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" value="{{ old('code') }}" maxlength="10">
                                @if ($errors->has('code'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('code') }}
                                    </div>
                                @endif
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

