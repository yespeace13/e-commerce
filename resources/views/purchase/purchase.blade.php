@php use Illuminate\Support\Facades\Auth; @endphp
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
    <div id="form-container" class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <div id="address-form" class="space-y-4">
            <h2 class="text-xl font-bold text-gray-700">Введите адрес</h2>
            <input
                type="text"
                id="address"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
                value="{{Auth::user()->address}}"
            />
            <button
                type="button"
                id="submit-address"
                class="w-full bg-orange-300 text-white py-2 rounded-lg hover:bg-orange-500 transition"
            >
                Отправить
            </button>
        </div>

        <form id="buy-form" class="hidden space-y-4" action="{{route('purchase.bank')}}">
            <h2 class="text-xl font-bold text-gray-700">Готово! Теперь вы можете купить</h2>
            <input id="sendAddress" name="address" class="hidden" value="{{Auth::user()->address}}">
            <input name="order_id" class="hidden" value="{{request()->order_id}}">
            <button
                type="submit"
                id="buy-button"
                class="w-full bg-orange-300 text-white py-2 rounded-lg hover:bg-orange-500 transition"
            >
                Купить
            </button>
            <button
                type="button"
                id="back-button"
                class="w-full bg-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-400 transition"
            >
                Вернуться назад
            </button>
        </form>

        <div class="mt-6">
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div id="progress-bar" class="bg-orange-300 h-2 rounded-full" style="width: 50%;"></div>
            </div>
        </div>
    </div>
</div>

<script>
    const addressForm = document.getElementById('address-form');
    const buyForm = document.getElementById('buy-form');
    const submitAddressButton = document.getElementById('submit-address');
    const backButton = document.getElementById('back-button');
    const progressBar = document.getElementById('progress-bar');
    const addressInput = document.getElementById('address')
    const sendAddressInput = document.getElementById('sendAddress')

    submitAddressButton.addEventListener('click', () => {
        if (addressInput.value != null && addressInput.value !== '') {
            sendAddressInput.value = addressInput.value
            addressForm.classList.add('hidden');
            buyForm.classList.remove('hidden');
            progressBar.style.width = '100%';
        }
    });

    backButton.addEventListener('click', () => {
        buyForm.classList.add('hidden');
        addressForm.classList.remove('hidden');

        progressBar.style.width = '50%';
    });
</script>

</body>
</html>
