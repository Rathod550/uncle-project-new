<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Title -->
    @yield('title')

    <!-- Style -->
    @include('frontTheme.style')

</head>

<body class="[word-spacing:.05rem!important] font-Manrope text-[0.8rem] !leading-[1.7] font-medium">

    <div class="grow shrink-0">

        <!-- Header -->
        @include('frontTheme.header')

        <!-- Content -->
        @yield('content')

    </div>
    
    <!-- Footer -->
    @include('frontTheme.footer')

    <!-- Script -->
    @yield('script')
    @include('frontTheme.script')
    
</body>

</html>