@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                    @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>

                                <div class="col-md-6">
                                <select name="position" class="from-control">
                                    <option>เลือกสถานะ</option>
                                    <option value="Education Officer">เจ้าหน้าที่นักการศึกษา</option>
                                    <option value="Advisor">อาจารย์ที่ปรึกษา</option>
                                    <option value="Lecturer">อาจารย์ประจำวิชา</option>
                                    <option value="Student">นักศึกษา</option>
                                    <option value="AdLec">อาจารย์ที่ปรึกษาและอาจารย์ประจำวิชา</option>
                                    <option value="LF">LF</option>
                                </select>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="curriculum" class="col-md-4 col-form-label text-md-right">Curriculum</label>

                            <div class="col-md-6">
                            <select name="curriculum" class="from-control">
                                <option>เลือกหลักสูตร</option>
                                <option value="MBIS">MBIS</option>
                                <option value="MIT2">MIT2</option>
                                <option value="BIT2">BIT2</option>
                                <option value="MITS">MITS</option>
                                <option value="BCS4">BCS4</option>
                                <option value="PHIT">PHIT</option>
                                <option value="BITT">BITT</option>
                                <option value="MBIO">MBIO</option>
                                <option value="MES2">MES2</option>
                                <option value="BITR">BITR</option>
                                <option value="PHCS">PHCS</option>
                                <option value="BIT4">BIT4</option>
                                <option value="MEBS">MEBS</option>
                                <option value="MSC2">MSC2</option>
                                <option value="DSI4">DSI4</option>
                                <option value="NO">No Curriculum</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="student_id" class="col-md-4 col-form-label text-md-right">{{ __('StudentID') }}</label>

                            <div class="col-md-6">
                                    <input id="student_id" type="text" class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}" name="student_id" value="{{ old('student_id') }}" required autofocus>

                                    @if ($errors->has('student_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('student_id') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="instructor_id" class="col-md-4 col-form-label text-md-right">{{ __('InstructorID') }}</label>

                        <div class="col-md-6">
                                <input id="instructor_id" type="text" class="form-control{{ $errors->has('instructor_id') ? ' is-invalid' : '' }}" name="instructor_id" value="{{ old('instructor_id') }}" required autofocus>

                                @if ($errors->has('instructor_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('instructor_id') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
