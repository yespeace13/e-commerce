<footer class="px-20 py-5 bg-red-200">
    <div class="flex flex-row justify-between items-center pb-5">
        <div class="">
            <h1 class="text-2xl">Присоединятесь к нам!</h1>
            <p>Скидка на первую покупку 10%.</p>
            <form action="{{route('register')}}" class="flex mt-5">
                @php($placeholder = "Email")
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :placeholder="$placeholder"
                              required/>
                <x-primary-button class="ms-3">
                    {{ __('Присоединиться') }}
                </x-primary-button>
            </form>
        </div>
        <div>
            <div class="mb-5">
                <h3 class="font-bold mb-2">Контакты</h3>
                <p>8(800)-555-35-35</p>
                <p>roll-doll@mail.com</p>
            </div>
            <div>
                <div class="flex gap-3">
                    <a href="#">
                        <img class="w-10" src="{{asset('/icons/icons8-telegram.svg')}}" alt="">
                    </a>
                    <a href="#">
                        <img class="w-10" src="{{asset('/icons/icons8-vk.svg')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div>
            <h3 class="font-bold mb-2">Категории</h3>
            <ul class="gap-2">
                <li><a href="{{route('products', ['category[]' => 3])}}">Игрушки</a></li>
                <li><a href="{{route('products', ['category[]' => 4])}}">Одежда</a></li>
                <li><a href="{{route('products', ['category[]' => 5])}}">Мебель</a></li>
                <li><a href="{{route('products', ['category[]' => 8])}}">Книги</a></li>
            </ul>
        </div>
        <div>
            <h3 class="font-bold mb-2">Меню</h3>
            <ul class="gap-2">
                <li><a href="{{route('products')}}">Каталог товаров</a></li>
                <li><a href="{{route('brands')}}">Бренды</a></li>
                <li><a href="{{route('brands')}}">О нас</a></li>
                <li><a href="{{route('brands')}}">Вопросы и ответы</a></li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="flex justify-between pt-5">
        <p>©ООО "НЕВАЛЯШКА"</p>
        <p>Правовые условия пользования сайтом</p>
        <p>Используем рекомендательные технологии</p>
    </div>
</footer>
