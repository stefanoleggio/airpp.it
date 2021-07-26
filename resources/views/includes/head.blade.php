<!-- Google seo -->
@if(Request::path() == 'organisociali')
  <meta name ="keywords" content="airpp, ricerca, patologie polmonari, polmoni, onlus, medicina, malattia, organi sociali, calabrese, tambuscio, saetta, rea, leggio, balestro, baraldo, favaretto, lodovichetti, marulli, cozzi, paolucci, lunardi, d'agostina panebianco, ballarin"/>
  <meta name ="description" content="Da chi è composta A.I.R.P.P.? ecco i nostri organi sociali"/>
@elseif(Request::path() == 'galleria')
  <meta name ="description" content="Le foto degli eventi di A.I.R.P.P."/>
  <meta name ="keywords" content="airpp, ricerca, patologie polmonari, polmoni, onlus, medicina, malattia, galleria"/>
@else
<meta name ="description" content="L’ A.I.R.P.P. nasce a Padova grazie ad un gruppo di ricercatori impegnati da anni nello studio delle patologie polmonari."/>
<meta name ="keywords" content="airpp, ricerca, patologie polmonari, polmoni, onlus, medicina, malattia"/>
@endif
<!-- -->
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width">
<meta name="author" content="Associazione Italiana Ricerca Patologie Polmonari" />
<meta name ="copyright" content="Associazione Italiana Ricerca Patologie Polmonari" />
<meta http-equiv="cache-control" content="no-cache"/>
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('/media/logo/favicon/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('/media/logo/favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('/media/logo/favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('/site.webmanifest')}}">
<link rel="stylesheet" href="{{ asset('/css/app.css') }}"/>
<link rel="stylesheet" href="{{ asset('/css/all.css') }}"/>
<script src="{{ asset('/jquery/jquery.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('js/modal.min.js') }}"></script>
<script src="{{ asset('js/loader.js') }}"></script>
<!-- Glide -->
<link rel="stylesheet" href="{{ asset('/css/glide.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('/css/glide.theme.css') }}"/>
<script src="{{ asset('js/glide.min.js') }}"></script>
<!-- aos -->
<link rel="stylesheet" href="{{ asset('/css/aos.css') }}" />

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link rel="stylesheet" href="{{ asset('/css/modal.min.css') }}"/>
<title>{{ $title }}</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{env('ANALYTICS_ID')}}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', "{{env('ANALYTICS_ID')}}");
</script>
<!-- Hotjar Tracking Code for www.airpp.it -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2197201,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
