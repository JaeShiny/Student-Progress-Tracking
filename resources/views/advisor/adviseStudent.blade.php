@extends('bar.header(ad)')

@section('content')

@foreach($myStudent as $ad_list)

{{$ad_list->bio->first_name}}

@endforeach

@endsection
