<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description"
    content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
<meta name="keywords"
    content="Tailwind CSS, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
<meta name="author" content="elemis">

<link rel="shortcut icon" href="{{ asset('frontTheme/images/sampad_favicon_o.png') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontTheme/fonts/unicons/unicons.css') }}">
<link rel="stylesheet" href="{{ asset('frontTheme/css/plugins.css') }}">
<link rel="preload" href="{{ asset('frontTheme/css/fonts/dm.css') }}" as="style" onload="this.rel='stylesheet'">
<link rel="stylesheet" href="{{ asset('frontTheme/style.css')}}">
<link rel="stylesheet" href="{{ asset('frontTheme/css/colors/aqua.css') }}">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

<style>
    .navbar.navbar-light.fixed .btn:not(.btn-expand):not(.btn-gradient) {
        background: #54a8c7 !important;
        border-color: #54a8c7 !important;
        color: #ffffff !important;
    }

    .accordion-wrapper .card-header button {
        color: #54a8c7;
    }

    @media (max-width: 991.98px) {
        .navbar-expand-lg .navbar-collapse .dropdown-toggle:after {
            color: #ffffff !important;
        }
    }

    .lineal-fill {
        fill: #98cbdd !important;
    }

    .animate-spin {
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@livewireStyles
