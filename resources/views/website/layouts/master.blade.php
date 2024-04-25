<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('website.layouts.head')
</head>
<body>
@include('website.layouts.navbar')

@yield('content')

@include('website.layouts.footer_script')
@include('website.layouts.footer')
</body>
</html>