@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Account </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div id="academic-number-field" style="display: block;">
                            <div class="row mb-3">
                                <label for="academic-number" class="col-md-4 col-form-label text-md-end">{{ __('academic_number') }}</label>

                                <div class="col-md-6">
                                    <input id="academic-number" value="null" type="text" class="form-control{{ $errors->has('AcademicNumber') ? ' is-invalid' : '' }}" name="AcademicNumber" required autocomplete="name">
                                    @if ($errors->has('AcademicNumber'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('AcademicNumber') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <br>

                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="role" value="student" checked onchange="toggleAcademicNumberField()"> Student
                                </label>
                                <label>
                                    <input type="radio" name="role" value="doctor"   onchange="toggleAcademicNumberField()"> Doctor
                                </label>
                                <br>

                            </div>

                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <script>
                        function toggleAcademicNumberField() {
                            var academicNumberField = document.getElementById("academic-number-field");
                            var academicNumberInput = document.getElementById("academic-number");
                            var studentRadioBtn = document.querySelector('input[name="role"][value="student"]');

                            if (studentRadioBtn.checked) {
                                academicNumberField.style.display = "block";
                                academicNumberInput.setAttribute("required", "");
                            } else {
                                academicNumberField.style.display = "none";
                                academicNumberInput.removeAttribute("required");
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
