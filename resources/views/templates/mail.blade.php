<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> 
    </head>
    <body style="font-family: 'Open Sans', sans-serif;">
        <table>
            <tr>
                <td>
                    <h1>
                        {{ $title }}
                    </h1>
                </td>
            </tr>
            @yield('content')
        </table>
    </body>
</html>