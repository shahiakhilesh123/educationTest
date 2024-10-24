@extends('layouts.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">{{ $course->course_name }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="/welcome">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="">{{ $course->course_name }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('/public/file') }}/{{ $course->image }}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">{{ $course->course_name }}</h6>
                    <?php echo $course->brief; ?>
                    <?php 
                    $batches = App\Models\Batch::where('course_id', $course->id)->get();
                    $batch_count = $batches->count();
                    $tests = App\Models\Test::where('course_id', $course->id)->where('status', 0)->get(); 
                    $test_count = $tests->count();
                    ?>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="{{ asset('/batch') }}/{{ $course->id }}">Join</a>
                    @if($batch_count > 0)
                    <a class="btn btn-primary py-3 px-5 mt-2" href="#batch">Batches</a>
                    @endif
                    @if($test_count > 0)
                    <a class="btn btn-primary py-3 px-5 mt-2" href="#test">Tests</a>
                    @endif
                    @if($course->course_index_pdf != '')
                        <a class="btn btn-primary py-3 px-5 mt-2" target="_blank" href="{{ asset('/public/file') }}/{{ $course->course_index_pdf }}">Download Course Index</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <?php echo $course->description; ?>
        </div>
        @if($batch_count > 0)
        <div class="row" id="batch" style="margin-top: 50px;">
             <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Batches</h6>
                <h1 class="mb-5">Courses Batches</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($batches as $batch)
                 <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('/public/file') }}/{{ $batch->batch_image }}" alt="" style="height: 273px;width: 100%;">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <!-- <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 " style="border-radius: 30px 0 0 30px;">Read More</a> -->
                                <a href="{{ asset('/join') }}/{{ $course->id }}/{{ $batch->id }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">Rs {{ $batch->current_cost }}</h3>
                            <!-- <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div> -->
                            <h5 class="mb-4">{{ $course->course_name }}</h5>
                            <h6>{{ $batch->batch_name }}</h6>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-phone text-primary me-2"></i>{{ $batch->phone_number }}</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>
                            {{ $batch->duration }}
                            </small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{ $batch->batch_size}} Students</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
        @endif
        
        @if($test_count > 0)
        <div class="row" id="test" style="margin-top: 50px;">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Tests</h6>
                <h1 class="mb-5">Courses Tests</h1>
            </div>
            <div class="row g-4 justify-content-center">
                
                @foreach ($tests as $test)
                 <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('/public/file') }}/{{ $test->image }}" alt="" style="height: 273px;width: 100%;">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <!-- <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 " style="border-radius: 30px 0 0 30px;">Read More</a> -->
                                <a href="{{ asset('/join') }}/{{ $course->id }}/{{ $batch->id }}" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                           
                            <h5 class="mb-4">{{ $course->course_name }}</h5>
                            <h6>{{ $test->name }}</h6>
                        </div>
                        <!-- <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-phone text-primary me-2"></i>{{ $batch->phone_number }}</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>
                            {{ $batch->duration }}
                            </small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{ $batch->batch_size}} Students</small>
                        </div> -->
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
        @endif
    </div>
    
    <!-- About End -->
@endsection