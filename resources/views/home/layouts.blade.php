<!DOCTYPE html>
<html lang="en">
<!-- ... -->
<head>

        
@include('home.homecss')
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=2">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">   

</head>
<body>
    

<div class="header_section">


@include("home.header")

{{-- @include('home.banner') --}}
        
</div>

<main>
        @yield('content')
    </main>

@include("home.footer")

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>