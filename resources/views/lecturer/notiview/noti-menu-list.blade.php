<ul class="dropdown-menu">
    @foreach($semester as $key => $show)
    <li id="{{$key}}">
        <a href="/showNotiL/{{$show->course_id}}/{{$show->semester}}/{{$show->year}}">
            {{$show->course_id}} ภาคเรียน: {{$show->semester}}/{{$show->year}}
        </a>
    </li>
    @endforeach
</ul>
