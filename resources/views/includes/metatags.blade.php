<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('title')</title>
<meta name="description"
  content="{{$settings["seo"]->description}}">
<meta name="robots" content="follow,index,max-snippet:-1,max-video-preview:-1,max-image-preview:large">
{{-- <link rel="canonical" href="https://codingphase.com/"> --}}
<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="{{$settings["general"]->site_title}}">
<meta property="og:description"
  content="{{$settings["seo"]->description}}">
{{-- <meta property="og:url" content="https://codingphase.com/"> --}}
<meta property="og:site_name" content="{{$settings["general"]->site_title}}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('title')">
<meta name="twitter:description"
  content="{{$settings["seo"]->description}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Come back and add multiple descriptions for each page for great SEO -->
