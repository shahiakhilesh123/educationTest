@extends('layouts.app')

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">{{ isset($data['type']) ? ($data['type'] == 1 ? 'Online' : 'Offline') : ''}}&nbsp;Tests</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">{{ isset($data['type']) ? ($data['type'] == 1 ? 'Online' : 'Offline') : ''}}&nbsp;Tests</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Batches</h6>
                <h1 class="mb-5">{{ isset($data['course']->course_name) ? $data['course']->course_name : '' }}</h1>
            </div>
            <div class="row g-4 justify-content-center">
                
                @foreach ($data['tests'] as $test)
                 <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('/public/file') }}/{{ $test->image }}" alt="" style="height: 273px;width: 100%;">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <!-- <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 " style="border-radius: 30px 0 0 30px;">Read More</a> -->
                                <a href="{{ asset('/join') }}/{{ $data['course']->id }}/{{ $test->batch_id }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                           
                            <h5 class="mb-4">{{ $data['course']->course_name }}</h5>
                            <h6>{{ $test->name }}</h6>
                        </div>
                       
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Courses End -->
@endsection