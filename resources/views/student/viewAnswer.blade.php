


{{-- @extends('bar.body')
@section('content')

<div class="card-content">
        <div class="col-sm" style="margin-top: px; padding: 5px;">
        <span class="card-title"> <h4> &nbsp; {{ $survey->title }} </h4> <h6>&nbsp;&nbsp;&nbsp;รายละเอียด : {{ $survey->description }}</h6> <h6>&nbsp;&nbsp;&nbsp;โดย : {{ $survey->user->name }}</h6></span></div>
        <hr style="margin-top: 0%">


</div>
<br><br>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">


  </head>
  <body>




    <section class="home-slider owl-carousel ftco-degree-bg">
      <div class="slider-item bread-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>

      </div>
    </section>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container bg-light" style="width: 70%;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
              <br>
            <h2 class="h4">{{ $survey->title }}</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-7">
            <p><span>รายละเอียด :</span> {{ $survey->description }}</p>
          </div>

          <div class="col-md-5">
            <p><span>ผู้ตอบ :&nbsp;รหัสนักศึกษา:</span> <a href="# ">{{Auth::user()->student_id}} </a></p><br><p><span>ชื่อ-นามสกุล :</span> <a href="#">{{Auth::user()->name}} &nbsp; {{Auth::user()->lastname}}</a></p>
          </div>

        </div>

        <div class="container">
                <div class="row">
                  <div class="col-sm-2">


                  </div>
                  <div class="col-sm-6">

                        <div class="row block-12">
                                <div class="col-md-6 pr-md-5">
                                  <form action="#">

                                    {{-- @foreach ($survey->question as $show_question)
                                  <h6 style="text-decoration-line: underline">คำถามข้อที่ {{$loop->iteration}}</h6>
                                    <div class="form-group">
                                          <div class="card" style="width: 30rem;">
                                                    <div class="card-body">
                                                         <p class="card-text">{{ $show_question->title }}</p>
                                                    </div>
                                          </div>
                                    </div>


                                    @foreach ($show_question->answerme as $show_answer => $test)
                                <h6>คำตอบ ข้อที่ {{$loop->iteration}}</h6>
                                    <div class="card" style="width: 30rem;">
                                      <div class="card-body">
                                        <p class="card-text">{{ $test->answer }} </p>
                                      </div>
                                    </div>
                                    @endforeach
                                    @endforeach --}}

         {{-- -------------------------------------------------------------------------------------------------  }}                          --}}

         {{-- @forelse ($question as $show_question)

         <h5 style="text-decoration-line: underline">{{ $show_question->title }}</h5>
         <div class="form-group">

         </div> --}}
        {{-- <h6>คำตอบ</h6>--}}


{{--
         <div class="card" style="width: auto; background-color:#F8F8FF;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
           <div class="card-body">
               --}}
            {{-- <p class="card-text"> ผู้ตอบ : <a href="#">{{ $answer->answerer->name}} &nbsp; {{ $answer->answerer->lastname }}</a> <br>คำตอบ : {{ $answer->answer }}</p><br><br>--}}
{{--

             <div class="form-group">
                 <label for="exampleFormControlSelect2">คำตอบ</label>

                 <select multiple class="form-control" id="exampleFormControlSelect2">
                         @foreach ($show_question->answerme as $show_answer => $test)
                         @if($test->user_id == Auth::id())
                   <option> <p class="card-text">{{  $test->answer }}  </p><br><br></option>
                        @endif
                   @endforeach

                 </select>
                 <br>
                 @empty
               </div>




<br>

           </div>
         </div>


         <div class="card" style="width: 30rem;">
                 <div class="card-body">
                   <p class="card-text">No answer </p>
                 </div>
               </div>
         @endforelse



                                    <div class="form-group">
                                            <input type="submit" value="แบบสอบถามทั้งหมด" class="btn btn-primary py-2 px-2">
                                           </div>
                                           <br>
                                  </form>

                                </div>

                  </div>

                </div>
              </div>

      </div>
    </section>
<br><br>


  </body>



@endsection @extends('bar.header(student)') --}}

@extends('bar.body')
@section('content')

<div class="card-content">
        <div class="col-sm" style="margin-top: px; padding: 5px;">
        <span class="card-title"> <h4> &nbsp; {{ $survey->title }} </h4> <h6>&nbsp;&nbsp;&nbsp;รายละเอียด : {{ $survey->description }}</h6> <h6>&nbsp;&nbsp;&nbsp;โดย : อาจารย์{{ $survey->user->name }}</h6></span></div>
        <hr style="margin-top: 0%">


</div>
<br><br>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">


  </head>
  <body>




    <section class="home-slider owl-carousel ftco-degree-bg">
      <div class="slider-item bread-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>

      </div>
    </section>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container bg-light" style="width: 70%;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
              <br>
            <h2 class="h4">{{ $survey->title }}</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-7">
            <p><span>รายละเอียด :</span> {{ $survey->description }}</p>
          </div>

          <div class="col-md-5">
            <p><span>ผู้ตอบ :&nbsp;รหัสนักศึกษา:</span> <a href="# ">{{Auth::user()->student_id}} </a></p><br><p><span>ชื่อ-นามสกุล :</span> <a href="#">{{Auth::user()->name}} &nbsp; {{Auth::user()->lastname}}</a></p>
          </div>

        </div>

        <div class="container">
                <div class="row">
                  <div class="col-2">


                  </div>
                  <div class="col-8">



                                  <form action="#">

                                    {{-- @foreach ($survey->question as $show_question)
                                  <h6 style="text-decoration-line: underline">คำถามข้อที่ {{$loop->iteration}}</h6>
                                    <div class="form-group">
                                          <div class="card" style="width: 30rem;">
                                                    <div class="card-body">
                                                         <p class="card-text">{{ $show_question->title }}</p>
                                                    </div>
                                          </div>
                                    </div>


                                    @foreach ($show_question->answerme as $show_answer => $test)
                                <h6>คำตอบ ข้อที่ {{$loop->iteration}}</h6>
                                    <div class="card" style="width: 30rem;">
                                      <div class="card-body">
                                        <p class="card-text">{{ $test->answer }} </p>
                                      </div>
                                    </div>
                                    @endforeach
                                    @endforeach --}}

         {{-- -------------------------------------------------------------------------------------------------  }}                          --}}

         @forelse ($question as $show_question)

         <h5 style="text-decoration-line: none">{{ $show_question->title }}</h5>

        {{-- <h6>คำตอบ</h6>--}}


{{--
         <div class="card" style="width: auto; background-color:#F8F8FF;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
           <div class="card-body">
               --}}
            {{-- <p class="card-text"> ผู้ตอบ : <a href="#">{{ $answer->answerer->name}} &nbsp; {{ $answer->answerer->lastname }}</a> <br>คำตอบ : {{ $answer->answer }}</p><br><br>--}}


             <div class="form-group">
                 <label for="exampleFormControlSelect2">คำตอบ</label>

                 <select multiple class="form-control" id="exampleFormControlSelect2">
                         @foreach ($show_question->answerme as $show_answer => $test)
                         @if($test->user_id == Auth::id())
                   <option> <p class="card-text">{{  $test->answer }}  </p><br><br></option>
                        @endif
                   @endforeach

                 </select>
                 <br>
                 @empty
               </div>




               <br>

            </div>
          </div>


          <div class="card" style="width: 30rem;">
                  <div class="card-body">
                    <p class="card-text">No answer </p>
                  </div>
                </div>
          @endforelse



                                     <div class="form-group">
                                             <input type="submit" value="แบบสอบถามทั้งหมด" class="btn btn-primary py-2 px-2">
                                            </div>
                                            <br>
                                   </form>

                                 </div>

                   </div>

                 </div>
               </div>

       </div>
     </section>
 <br><br>


   </body>



 @endsection
 @extends('bar.header(student)')

