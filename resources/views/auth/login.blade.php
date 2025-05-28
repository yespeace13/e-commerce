<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')"/>
    <form class method="POST" action="{{ route('login') }}">
        <h1 class="text-center mb-5 text-xl">Авторизация</h1>
        @csrf
        <div>
            <x-input-label for="email" :value="__('Почта')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                          required autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Пароль')"/>
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4 gap-5">

            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 shadow-sm focus:ring-orange-300 dark:focus:ring-orange-300 text-orange-300"
                           name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Запомнить меня') }}</span>
                </label>
            </div>
            <x-primary-button class="ms-3">
                {{ __('Войти') }}
            </x-primary-button>
        </div>

        <div class="text-center mt-5 mb-5">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('register') }}">
                {{ __('Еще не с нами?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
