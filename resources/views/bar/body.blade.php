<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบติดตามความก้าวหน้าของนักศึกษา</title>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    @yield('javascript')
</head>

<body>
    {{-- @include('bar.header(lec)') --}}
    @yield('content')

</body>

{{-- <script>
        $( document ).ready(function() {
            $('#addme').hide();
        });
        $('#question_type').change(function() {
            if($(this).val() === 'checkbox') {
                $('#choice').show();
                $('#addme').show();
            }
            if($(this).val() === 'radio') {
                $('#choice').show();
                $('#addme').show();
            }
            if($(this).val() === 'text') {
                $('#addme').hide();
                $('#choice').hide();
            }
            if($(this).val() === 'textarea') {
                $('#addme').hide();
                $('#choice').hide();
            }

        });

        $('#addme').click(function() {

            $('#choice2').append("<input id='ans' type='text' name='choice[]' value='' class='form-control'>");
        });
    </script> --}}
</html>
