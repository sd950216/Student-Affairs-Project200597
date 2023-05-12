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
                        <div id="academic-number-field" style="display: none;">
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
                        <div id="doctor-specialization-field" style="display: none;">
                            <div class="row mb-3" >
                                <label for="specialization" class="col-md-4 col-form-label text-md-end">{{ __('specialization') }}</label>
                                <br>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="specialization" style="margin-top: 5px;">Choose a Course:</label>
                                        <select id="specialization" class="{{ $errors->has('specialization') ? ' is-invalid' : '' }}" name="specialization" style="padding: 4px;border-radius: 4px;border: 1px solid #ccc; font-size: 16px;background-color: #0a53be;color: #EEEEEE;width: 30%">
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->name}}" style="padding: 8px;  font-size: 16px;">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('specialization'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('specialization') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <br>

                            <div class="col-md-6">
                                <label>
                                    <input type="radio" name="role" value="student"  required {{old('role')=='student'?'checked':''}} onchange="toggleAcademicNumberField()"> Student
                                </label>
                                <label>
                                    <input type="radio" name="role" value="doctor"  {{old('role')=='doctor'?'checked':''}} onchange="toggleAcademicNumberField()"> Doctor
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
                        var DoctorSpecializationField = document.getElementById("doctor-specialization-field");
                        var academicNumberField = document.getElementById("academic-number-field");

                        @if($errors->has('specialization'))
                            DoctorSpecializationField.style.display = "block";


                        @endif
                        @if ($errors->has('AcademicNumber'))
                            academicNumberField.style.display = "block";

                        @endif
                        function toggleAcademicNumberField() {
                            var academicNumberInput = document.getElementById("academic-number");
                            var studentRadioBtn = document.querySelector('input[name="role"][value="student"]');
                            var DoctorSpecializationInput = document.getElementById("specialization");



                            if (studentRadioBtn.checked) {
                                academicNumberField.style.display = "block";
                                academicNumberInput.setAttribute("required", "");
                                DoctorSpecializationField.style.display = "none";
                                DoctorSpecializationInput.removeAttribute("required");
                            } else {
                                academicNumberField.style.display = "none";
                                academicNumberInput.removeAttribute("required");
                                DoctorSpecializationField.style.display = "block";
                                DoctorSpecializationInput.setAttribute("required", "");
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
