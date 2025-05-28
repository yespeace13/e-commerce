<header class="absolute top-0 w-full">
    <div class="flex justify-between mx-14 my-5 items-center bg-red-200 rounded-xl px-10 py-2">
        <a href="{{route('home')}}" class="flex items-center gap-5">
            <img class="w-8" src="{{asset('icons8-cheburashka.svg')}}" alt="">
            <h1 class="text-3xl">Неваляшка</h1>
        </a>
        <nav class="">
            <ul class="flex flex-row gap-5">
                <li><a href="{{route('home')}}">Главная</a></li>
                <li><a href="{{route('products')}}">Каталог товаров</a></li>
                <li><a href="{{route('brands')}}">Бренды</a></li>
                <li><a href="{{route('about-us')}}">О нас</a></li>
            </ul>
        </nav>
        <div class="flex flex-row gap-5">
            <a class="flex gap-1" href="{{route('orders')}}">
                <div class="w-6 align-middle text-center bg-cover bg-[url(../image/basket.png)]">
                </div>
                Корзина
            </a>
            @if(\Illuminate\Support\Facades\Auth::user() != null)
                @if(\Illuminate\Support\Facades\Auth::user() != null && Auth::user()->is_admin)
                    <a href="{{route('admin')}}">Админ. панель</a>
                @else
                    <a href="{{route('dashboard')}}">Личный кабинет</a>
                @endif
                <a href="{{route('logout')}}">Выйти</a>
            @else
                <a href="{{route('login')}}">Войти</a>
            @endif
        </div>
    </div>
</header>
