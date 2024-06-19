@extends('layouts.frontend')

@section('content')
        <div id="LogInBody" class="banner-section_About" style="">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="">
                            <!-- <h2 class="FormHeading">Sign Up to <span>Car4Hires</span></h2> -->
                            <div class="InputField">
                                 <div class="">
                                 @yield('content')
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection