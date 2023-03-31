<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="4aHSufNitSu-eVhpGPYjnYXs_tZcldOBt52IuKkQJC8" />
    @hasSection('description')
        <meta name="description" content= "@yield('description')" />
        <meta property="og:description" content="@yield('description')">
        <meta name="twitter:description" content="@yield('description')">
    @else
        <meta name="description" content="หลักสูตรนักบริหารการงบประมาณระดับกลาง (นงก.)" />
        <meta property="og:description" content="หลักสูตรนักบริหารการงบประมาณระดับกลาง (นงก.)">
        <meta name="twitter:description" content="หลักสูตรนักบริหารการงบประมาณระดับกลาง (นงก.)">
    @endif

    @hasSection('url')
        <meta property="og:url" content="@yield('url')">
        <meta property="twitter:url" content="@yield('url')">
    @else
        <meta property="og:url" content="https://innovation.bb.go.th">
        <meta property="twitter:url" content="https://innovation.bb.go.th">
    @endif

    @hasSection('image')
        <meta property="og:image" content="@yield('image')">
        <meta name="twitter:image" content="@yield('image')">
    @else
        <meta property="og:url" content="">
        <meta property="twitter:url" content="">
    @endif
    <meta name="keywords" content="ระบบสืบค้นบัญชีนวัตกรรมไทย,บัญชีนวัตกรรมไทย,วัตกรรมไทย, สำนักงบประมาณ" />
    <meta name="author" content="" />

  <!-- Facebook Meta Tags -->
  <meta property="og:type" content="@yield('ogType','website')" />
  <meta property="og:title" content="@yield('title')">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="innovation.bb.go.th">

  <meta name="twitter:title" content="@yield('title')">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@1,300&family=Kanit:wght@400;500&family=Pridi&family=Sarabun:wght@200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link  rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/modify.css') }}">
    <link rel="stylesheet" href="{{ asset('js/jquery-ui/jquery-ui.css')}}">
    @stack('style')
</head>
