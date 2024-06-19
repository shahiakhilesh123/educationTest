@extends('layouts.forgotpassword')

@section('content')
<div class="container">
    <div class="row justify-content-center" id="LogInBody">
        <div class="col-md-3"></div>
        <div class="col-md-6 p_1 FormWrapper">
        <h2 class="signInTitleDiv"><span>Forgot Password ?</span></h2>
        <div class="signInSubTitleTxt">Don't worry, we will reset it for you.</div>

        <div class="CommonInputLabel">
            Enter your email address and We'll send you an e-mail to reset it
            <br>
            <span class="orange">If you not find e-mail please check your spam also </span>:
            <br><br>
        </div>
        <div class="form-group">
                <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row mb-3">

                    <div class="col-md-12">
                        <input id="email" placeholder="Enter Email address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-0">
                    <div class="col-md-8 col-lg-offset-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('RESET PASSWORD') }}
                        </button>
                    </div>
                </div>
            </form>
            </div>    
    </div>
        <div class="col-md-3"></div>
</div>
@endsection
