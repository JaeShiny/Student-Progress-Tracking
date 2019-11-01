{{-- @extends('bar.body')

@section('content')
<h4>{{ $survey->title }}</h4>
<table class="bordered striped">
  <thead>
    <tr>
        <th data-field="id">Question</th>
        <th data-field="name">Answer(s)</th>
    </tr>
  </thead>

  <tbody>
    @forelse ($survey->questions as $item)
    <tr>
      <td>{{ $item->title }}</td>
      @foreach ($item->answers as $answer)
        <td>{{ $answer->answer }} <br/>
        <small>{{ $answer->created_at }}</small></td>
      @endforeach
    </tr>
    @empty
      <tr>
        <td>
          No answers provided by you for this Survey
        </td>
        <td></td>
      </tr>
    @endforelse
  </tbody>
</table>
@endsection
@extends('bar.header(student)') --}}

@extends('bar.body')
@section('content')

<div class="card-content">
        <div class="col-sm" style="margin-top: px; padding: 5px;">
        <span class="card-title"> <h4> &nbsp; {{ $survey->title }} </h4> <h6>&nbsp;&nbsp;&nbsp;รายละเอียด : {{ $survey->description }}</h6> <h6>&nbsp;&nbsp;&nbsp;โดย : {{ $survey->user->name }}</h6></span></div>
        <hr style="margin-top: 0%">

{{-- &nbsp; &nbsp; &nbsp; &nbsp; <a href='view/{{$survey->id}}'>ทำแบบสำรวจ</a> | <a href="{{$survey->id}}/edit">แก้ไขหัวข้อแบบสำรวจ</a> | <a href="/survey/answers/{{$survey->id}}">ดูผลการตอบแบบสำรวจ</a> <a href="#doDelete" style="float:right; text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ &nbsp; &nbsp;&nbsp;</a> --}}



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




    <body>



        <button type="text" class="btn btn-primary py-2 px-2" style="position: relative; float: right;right: 21%">แบบสอบถามทั้งหมด</button>
    <section class="home-slider owl-carousel ftco-degree-bg">
      <div class="slider-item bread-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>

      </div>
      <br><br>
    </section>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container" style="width: 60%;">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
              <br>
              <div class="form-group" style="background-color:#F5F5F5;margin-top: -2%;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                    <div class="card mb-3" style="max-width: 50rem; background-color: #FFFFFF;border-bottom-color: teal">
           <a name="Modal1"> <h2 class="h4">&nbsp;&nbsp;{{ $survey->title }}</h2><p>&nbsp;&nbsp;&nbsp;รายละเอียด : {{ $survey->description }}</p></a>
          </div>
          <div class="w-100"></div>
          <div class="col-md-12">
                <form action="#">

                    @forelse ($question as $show_question)

                    <h5 style="text-decoration-line: underline">{{ $show_question->title }}</h5>
                    <div class="form-group">

                    </div>
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
                              <option> <p class="card-text">- {{  $test->answer }}  </p><br><br></option>

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


                        <br>
                        <br>




                        <div class="form-group">
                                <a href="#Modal1" style="text-decoration-line: none;color: white"> <button type="text" class="btn btn-primary py-2 px-2">ย้อนกลับ</button></a>
                               </div>
                               <br>
                      </form>
          </div>
              </div>
          </div>
          <div class="col-md-5">

            {{-- <p><span>ผู้ตอบ :&nbsp;รหัสนักศึกษา:</span> <a href="#">{{$survey->questions->answers->answerer->name}} </a></p><br><p><span>ชื่อ-นามสกุล :</span> <a href="#">{{Auth::user()->name}} &nbsp; {{Auth::user()->lastname}}</a></p> --}}

        </div>

        </div>



      </div>
    </section>
<br><br>


  </body>


  </body>



@endsection
@extends('bar.header(lec)')
