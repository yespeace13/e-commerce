<!DOCTYPE html>
<html class="min-h-screen" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('icons8-cheburashka.svg')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-normal min-h-screen flex flex-col text-gray-600">
<x-header/>
<div class="flex-1 bg-[#FBF6F0]">
    {{ $slot }}
</div>
<x-footer class="flex-shrink"/>
</body>
</html>
