<html>
    <head>
        <title>{{ $object }}</title>
    </head>
    <body>
        <style>
            html {
                font-size: 62.5%;
            }

            body {
                font-family: "Lato", sans-serif;
                font-weight: 400;
                line-height: 1.7;
                color: rgb(63, 63, 63);
            }

            .main_container{
                margin-top: 10rem;
            }

            .mail__banner{
                width: 100%;
                text-align: center;
                color: #ed9090; 
            }

            .heading-secondary {
                font-size: 3rem;
                text-transform: uppercase;
                font-weight: 700;
                display: inline-block;
                letter-spacing: .2rem;
                transition: all .2s;
            }

            hr{
                border: none;
                border-top: 2px solid #eee;
                margin: 2.2rem 0;
            }

            table{
                padding: 2rem;
                width: 100%;
            }

            .row {
                width: 45%;
                margin: 0 auto;
            }

            .row:not(:last-child) {
                margin-bottom: 1rem;
            }

            .row::after {
                content: "";
                display: table;
                clear: both;
            }

            .row [class^=col-] {
                float: left;
            }

            .row [class^=col-]:not(:last-child) {
                margin-right: 6rem;
            }

            .row .col-1-of-2 {
                width: calc((100% - 6rem) / 2);
                font-size: 1.5rem;
            }

            .table__desc{
                font-weight: bold;
            }

            .table__data{
                text-transform: capitalize;
            }

            .table__cf{
                text-transform: uppercase;
            }

            .table__amount{
                color: #ed9090;
            }

            .mail{
                padding: 4rem;
                text-align: center;
            }

            .mail__title{
                width: 100%;
                text-align: center;
                font-size: 2rem;
                margin-bottom: 3.5rem;
                text-transform: uppercase;
                font-weight: 700;
                display: inline-block;
                letter-spacing: .2rem;
                transition: all .2s;
            }

            .table{
                text-align: left !important;
            }

            @media screen and (max-width: 600px) {
                .row .col-1-of-2 {
                    width: 100%;
                }
                .row [class^=col-] {
                    float: none;
                }
                .row [class^=col-]:not(:last-child) {
                    margin-top: 2rem;
                    margin-right: none;
                }
            }
        </style>
        <div class="mail">
            <div class="mail__banner heading-secondary">
                {{ $object }}
            </div>
            <hr>
            @yield('content')
            <div class="mail__footer u-container-fullwidth">
            </div>
        </div>
    </body>
</html>