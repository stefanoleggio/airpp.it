<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=2">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
        <style>
            *,
            *::after,
            *::before {
                margin: 0;
                padding: 0;
                box-sizing: inherit;
            }
            body{
                font-family: 'Open Sans', sans-serif;
            }
            .main{
                padding: 2rem;
                text-align: center !important;
            }
            .title{
                color: #153d8a;
                font-weight: bold;
                letter-spacing: 0.2rem;
                font-size: 2rem;
                text-align: center;
            }
            .int{
                padding: 2rem;
                font-size: 1.5rem;
                padding-left: 5rem;
                padding-right: 5rem;
            }
            table{
                text-align: left;
            }
            .form_group{
                padding-left: 1rem;
                font-size: 1rem;
            }
            .form_main{
                font-weight: bold;
                font-size: 1.5rem;
            }
            .close{
                height: 5rem;
            }
        </style>
    </head>
    <body style="background: #d6d6d5; text-align:center">
        <table style="background: white; display: inline-block; border-collapse: collapse;">
            <tr>
                <td class="title main">
                    {{ $title }}
                </td>
            </tr>
            @yield('content')
            <tr>
                <td class="close">
                </td>
            </tr>
        </table>
    </body>
</html>