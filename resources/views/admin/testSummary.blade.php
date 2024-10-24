@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Test</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/test') }}">Test</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/test') }}/edit/">Question</a></li>
              <li class="breadcrumb-item active">Test</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Test</h3>
              </div>
              <?php 
              $attemp = App\Models\studentTestAttenmp::where('id', $test)->where('student_id', $user->id)->first();
              $TotalTest = App\Models\Question::where('test_id', $test)->sum('marks');
              if(!isset($attemp->total_marks)) {
                $total = Illuminate\Support\Facades\DB::select("select sum(if(student_answer.answer = question.answer, question.marks, 0)) as marks from student_answer, question where student_answer.question_id = question.id and student_id = 1");
                App\Models\studentTestAttenmp::where('id', $test)->where('student_id', $user->id)->update([
                    'total_marks' => $total
                ]);
                $total_marks =  $total[0]->marks;
                // $question = App\Models\Question::where('id', $test)->get(); 
                // $ans = App\Models\studentAnswer::where('id', $test)->where('student_id', $user->id)->get();
              } else {
                $total_marks = $attemp->total_marks;
              }
              ?>
               <div class="alert alert-success alert-dismissible">
                  <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                  <h5><i class="icon fas fa-check"></i> <?php  echo "Total Marks: ".$total_marks; ?></h5>
                  <?php echo "</br>You Got ".rand($total_marks / $TotalTest * 100, 2) . "%"; ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection