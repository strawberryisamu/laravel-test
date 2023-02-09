<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                font-size: 30px;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > button {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background-color: white;
                border: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .bottom-container {
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{$todo->title}}
                </div>
                
                <table class='flex-center'>
                    <tr>
                    <th>内容</th>
                    </tr>
                    <tr>
                    <th>{{$todo->content}}</th>
                    </tr>
                </table>
                
                <div class=bottom-container>
                    <div class='links'>
                        <a href='/todolists/{{$todo->id}}/edit'>編集</a>
                    </div>

                    <div>
                        <form method='post' action='/todolists/{{$todo->id}}' >
                            <input name="_method" type="hidden" value="DELETE">
                            <div class='links'>
                                <button type='submit'>削除
                            </div>
                        </form>
                    </div>

                    <div class='links'>
                        <a href='/todolists'>戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
