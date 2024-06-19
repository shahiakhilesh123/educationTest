@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center" id="LogInBody">
        <div class="col-md-1"></div>
        <div class="col-md-10 p_1 FormWrapper">
            <div id="pnlHeadingMain">
                <h2 class="FormHeading">Sign Up to <span>Car4Hires</span></h2>
            </div>
            <div class="form-group">
                <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row col-xs-12 col-sm-12 col-md-12 m_1">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                            <label for="usr">ENTER FIRST NAME:</label>
                            &nbsp;
                            <input id="firstname" placeholder="ENTER FIRST NAME" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                            @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                            <label for="usr">ENTER LAST NAME:</label>
                            &nbsp;
                            <input id="lastname" placeholder="ENTER LAST NAME" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                            @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
                </div> 
                
                <div class="row col-xs-12 col-sm-12 col-md-12 m_1">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                            <label for="usr">ENTER MOBILE:</label>
                            &nbsp;
                            <input id="phone" placeholder="ENTER MOBILE" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                            <label for="usr">ENTER EMAIL:</label>
                            &nbsp;
                            <input id="email" placeholder="ENTER EMAIL" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
                </div> 
                
                <div class="row col-xs-12 col-sm-12 col-md-12 m_1">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                            <label for="usr">PASSWORD:</label>
                            &nbsp;
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                            <label for="usr">CONFIRM PASSWORD:</label>
                            &nbsp;
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="password-confirm">
                             @error('password-confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                    </div>
                </div> 
                
                <div class="row col-xs-12 col-sm-12 col-md-12 m_1">
                    
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">
                            {{ __('SIGN UP') }}
                        </button>
                    </div>
                </div>
                
                <div class="row col-xs-12 col-sm-12 col-md-12 m_1">
                    <div class="col-md-8 col-lg-offset-2">
                        @if (Route::has('login'))
                        <p class="BottomText">
                                Already have an account?  
                            <a id="lnkbtn_SIgnUp" class="FrgtPwd" href="{{ route('login') }}">Sign In</a>
                             Now 
                            </p>
                        @endif
                    </div>
                </div>
                
            </form>
            </div>    
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

@endsection
