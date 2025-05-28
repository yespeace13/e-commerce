<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#FCF6F0]">
    <div>
        Заглушка для банка

        <form class="space-y-4" action="{{route('purchase')}}" method="post">
            @csrf
            <input class="hidden" name="address" value="{{request()->address}}">
            <input name="order_id" class="hidden" value="{{request()->order_id}}">
            <input class="hidden" name="status" value="success">
            <button
                type="submit"
                id="buy-button"
                class="w-full bg-orange-300 text-white py-2 rounded-lg hover:bg-orange-500 transition"
            >
                Купить
            </button>
        </form>
        <form action="{{route('purchase')}}" method="post">
            @csrf
            <input class="hidden" name="address" value="{{request()->address}}">
            <input class="hidden" name="status" value="failed">
            <button
                type="submit"
                id="back-button"
                class="w-full bg-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-400 transition"
            >
                Вернуться назад
            </button>
        </form>
    </div>
</div>

</body>
</html>
