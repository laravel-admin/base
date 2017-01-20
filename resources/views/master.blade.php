<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Admin -->
    <link rel="stylesheet" href="/mdb/css/bootstrap.min.css">
    <link rel="stylesheet" href="/mdb/css/mdb.css">
</head>
<body class="@yield('body-class')">
<!-- Admin menu -->
@if(auth()->user())
    @include('admin::menu')
@endif

@yield('content')

<!-- Admin -->
<script src="/js/app.js"></script>
<script src="/mdb/js/mdb.min.js"></script>

<script>
    $(".button-collapse").sideNav();
</script>

@yield('scripts')
</body>
</html>
