<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Custom CSS for Background Image and Image Overlay --}}
        <style>
            body {
                margin: 0;
                padding: 0;
                overflow: hidden; /* Prevents scrolling if background image is larger than viewport */
            }

            .full-screen-bg {
                background-image: url('{{ asset('images/background-main.jpg') }}'); /* Replace with your main background image path */
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -3; /* Lowest layer */
            }

            .image-overlay {
                background-image: url('{{ asset('images/transparency-texture.png') }}'); /* Replace with your transparent image texture path */
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                opacity: 0.5; /* Makes the image overlay 50% transparent */
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -2; /* Above the main background, below content */
            }

            /* Ensure the guest-layout-wrapper div has no background from Tailwind */
            .guest-layout-wrapper {
                 background-color: transparent !important;
            }

            /* Set the form box background to solid white */
            .form-box {
                background-color: white !important; /* Makes the box solid white */
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{-- Full Screen Background Image --}}
        <div class="full-screen-bg"></div>
        {{-- Transparent Image Overlay --}}
        <div class="image-overlay"></div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 guest-layout-wrapper">
            {{-- This slot will render your login/register form content --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg form-box">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>