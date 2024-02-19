<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="FeedMillApp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="adam">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    {{-- Fonts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- Styles --}}
    @yield('styles')
    @livewireStyles
    {{-- Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('scripts')
  </head>
  <body class="font-sans antialiased">
    @if (session()->has('success'))
        <x-modal type="success" title="Success" message="{{session()->get('success')}}" />
    @elseif(session()->has('error'))
        <x-modal type="error" title="Error" message="{{session()->get('error')}}" />
    @endif
    {{-- @auth --}}
      @extends('layouts.system')
    {{-- @else
      @yield('content')
    @endauth --}}
    @livewireScripts
    <script>
        Livewire.onPageExpired((response, message) => {})
    </script>
  </body>
</html>
