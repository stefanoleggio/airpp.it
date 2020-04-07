<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width">
<meta name ="description" content="associazione italiana ricerca patologie polmonari"/>
<meta name ="keywords" content="airpp, ricerca, patologie polmonari, onlus, medicina, malattia"/>
<meta name="author" content="Stefano Leggio" />
<meta name ="copyright" content="airpp onlus" />
<meta name="robots" content="index"/>
<meta http-equiv="cache-control" content="no-cache"/>
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('/media/logo/favicon/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('/media/logo/favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('/media/logo/favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('/site.webmanifest')}}">
<link rel="stylesheet" href="{{ asset('/css/app.css') }}"/>
<link rel="stylesheet" href="{{ asset('/css/all.css') }}"/>
@if(Request::path() == '/')
<link rel="stylesheet" href="{{ asset('/css/loader.css') }}"/>
@endif
<script src="{{ asset('/jquery/jquery.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('js/modal.min.js') }}"></script>
<script src="{{ asset('js/loader.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link rel="stylesheet" href="{{ asset('/css/modal.min.css') }}"/>
<title>{{ $title }}</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{env('ANALYTICS_ID')}}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', "{{env('ANALYTICS_ID')}}");
</script>