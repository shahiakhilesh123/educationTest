@extends('layouts.app')

@section('content')
 <!-- Header Start -->
 <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Join Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="/welcome">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="">Join Us</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Join Us</h6>
                <h1 class="mb-5">&nbsp;</h1>
            </div>
            <?php  $course = App\Models\Course::where('id', $data['course_id'])->first(); ?> 
            <div class="row g-4">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                @if($course->current_cost == 0)
                    <form method="post" action="{{ asset('/join') }}/{{ $data['course_id'] }}/{{ $data['batch_id'] }}" enctype="multipart/form-data">
                @else
                    <form method="post" action="{{ asset('/pay') }}/{{ $data['course_id'] }}/{{ $data['batch_id'] }}" enctype="multipart/form-data">
                @endif
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="hidden" name="batch_id" name="batch_id" value="{{ $data['batch_id'] }}">
                                <input type="hidden" name="batch_id" name="course_id" value="{{ $data['course_id'] }}">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="date_of_birth" value="{{ old('date_of_birth') }}" name="date_of_birth" placeholder="Date of Birth">
                                    <label for="subject">Date of Birth</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="file_image" value="{{ old('file_image') }}" name="file_image" placeholder="Your Image">
                                    <label for="file_image">Your Image</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="file_adhar" value="{{ old('file_adhar') }}" name="file_adhar" placeholder="Your Adhar">
                                    <label for="file_adhar">Adhar Id</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="file_marks" value="{{ old('file_marks') }}" name="file_marks" placeholder="Your 10th Marks sheet">
                                    <label for="file_marks">10th Marks sheet</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Your Name">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Your Email">
                                    <label for="email">Confirm Password</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                <input type="text" class="form-control" id="address" value="{{ old('address') }}" name="address" placeholder="Address">
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Register/Pay {{ $course->current_cost }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection