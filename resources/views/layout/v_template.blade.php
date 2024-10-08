<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('PrimeLTE/style/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('PrimeLTE/style/css/style.css') }}">
   </head>
<body>

        @include('layout.v_nav')

        <div class="container">
        <!--main section-->
        <main class="content">
        
        </nav>
        <div class="bodykonten">
            @yield('content')
            </div>
        </main>
    </div>
  
    <script src="{{ asset('PrimeLTE/style/js/nav.js') }}"></script>
</body>
</html>