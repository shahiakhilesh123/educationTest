@extends('layouts.app')

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">{{ isset($data['type']) ? ($data['type'] == 1 ? 'Online' : 'Offline') : ''}}&nbsp;Courses</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">{{ isset($data['type']) ? ($data['type'] == 1 ? 'Online' : 'Offline') : ''}}&nbsp;Courses</li>
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
                @if(count($data['studies']) != 0)
                    @foreach ($data['studies'] as $study)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ asset('/public/file') }}/{{ $study->image }}" alt="" style="height: 273px;width: 100%;">
                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <!-- <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 " style="border-radius: 30px 0 0 30px;">Read More</a> -->
                                    <a href="{{ asset('/join') }}/{{ $data['course']->id }}/{{ $study->id }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Join Now</a>
                                </div>
                            </div>
                            <div class=" p-4 pb-0">
                                <h3 class="mb-0">{{ $study->name }}</h3>
                                <!-- <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small>(123)</small>
                                </div> -->
                                <h5 class="mb-4"><?php echo $study->description; ?></h5>
                                <h6></h6>
                            </div>
                            <div class="p-4 pb-0">
                                <div>
                                Soft copy Price= {{ $study->online_price }}
                                </div>
                                <div>
                                Hard copy Price= {{ $study->online_price }}
                                </div>
                            </div>
                            <!-- <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-phone text-primary me-2"></i></small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>
                                </small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i> Students</small>
                            </div> -->
                        </div>
                    </div>
                    @endforeach
                @else
                <div style="text-align: center;"> No Course Found </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Courses End -->
@endsection