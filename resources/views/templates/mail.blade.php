<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=2">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
        <style>
            body{
                font-family: 'Open Sans', sans-serif;
            }
            .main{
                padding: 2rem;
                text-align: center !important;
            }
            .title{
                background: #153d8a;
                color: white;
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
                padding-left: 5rem;
                padding-right: 5rem;
                padding-top: 0.5rem;
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
        <table width="600" style="background: white; display: inline-block; border-collapse: collapse;">
            <tr>
                <td width="600" class="main">
                    <img src="http://phplaravel-332151-1020027.cloudwaysapps.com/media/logo/logo.svg" width="200"alt="">
                </td>
            </tr>
            <tr>
                <td width="600" class="title main">
                    {{ $title }}
                </td>
            </tr>
            <tr>
                <td width="600" class="int">
                    {{ $intro }}
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