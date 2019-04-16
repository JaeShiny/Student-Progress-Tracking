<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบติดตามความก้าวหน้าของนักศึกษา</title>
    <style>
        body {
            background-color: black;
        }

        .t1 {
            float: right;
            width: 300px;
            height: 38px;
            text-align: center;
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <div class="t1">
        @guest
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

        @if (Route::has('register'))

            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

        @endif
        @else

            Username: {{ Auth::user()->name }} <span class="caret"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <button type="button" class="btn">

                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>
            </button>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @endguest

    </div>

</body>

</html>
