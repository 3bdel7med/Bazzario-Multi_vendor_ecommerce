<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!-- favicon -->
 <link rel="icon" type="image/png" href="bazario.png">
<title>
@yield('title')
</title>
 @vite('resources/css/app.css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,300;0,600;0,900;1,300;1,600&family=Instrument+Sans:wght@400;500;600&family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>
<link rel="stylesheet" href="{{ asset('bootstrap/app.css') }}"/>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@yield('styles')

</head>
<body >
    @include('sections.header')
    @yield('content')
    @include('sections.footer')

     @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/css/app.js') }}"></script>
    @yield('script')
</body>
</html>

