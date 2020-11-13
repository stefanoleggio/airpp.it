<html>
    <head>
    </head>
    <body>
        Possible bruteforce attack with:
        <div>
            <b>Email: </b>{{$request->email}}
        </div>
        <div>
            <b>Password: </b>{{$request->password}}
        </div>
        <div>
            <b>Code: </b>{{$request->code}}
        </div>
        <div>
            <b>IP: </b>{{$request->getClientIp()}}
        </div>
    </body>
</html>