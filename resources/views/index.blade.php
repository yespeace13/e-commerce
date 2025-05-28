<x-app-layout>
    <div
        class="min-h-screen bg-[url(../image/115872079_l_1.jpg)] bg-no-repeat bg-cover flex flex-col justify-center items-end">
        <div class="w-1/2 p-10 text-black bg-sky-100 bg-opacity-30 rounded-3xl m-16">
            <h1 class="text-4xl font-bold mb-5">
                Всё для маленьких мечтателей<br>
                и больших приключений!
            </h1>
            <p class="text-xl">
                У нас всё, что нужно для счастья ваших малышей: от игрушек до одежды и аксессуаров.
                Мы выбираем только лучшее, чтобы вы могли быть уверены в качестве и безопасности.
                Покупайте с радостью — ведь у нас не только яркий ассортимент, но и приятные цены!
            </p>
        </div>
    </div>

    <div class="text-center bg-[#FBF6F0] pb-10">
        <h1 class="text-4xl p-10">Новинки</h1>
        <div class="flex gap-10 justify-center flex-wrap">
            @foreach($productsNew as $product)
                <x-product-card :product="$product"/>
            @endforeach
        </div>
    </div>

    <div class="bg-[#FBF6F0] flex justify-center text-4xl">
        <table class="p-10 text-center w-9/12 m-10 min-h-48 table-auto border-spacing-5 border-separate">
            <tr class="">
                <td class="border-solid m-20 bg-[url(../image/knitting-1614283_1280.jpg)] bg-center bg-no-repeat bg-cover text-white rounded-3xl">
                    <a href="{{route('products', ['category[]'=> 3])}}">
                        <div class="w-full min-h-full">Игрушки</div>
                    </a>
                </td>

                <td class="border-solid p-10 bg-[url(../image/baby-clothes-5749670_1280.jpg)] bg-center bg-no-repeat bg-cover text-white rounded-3xl">
                    <a href="{{route('products', ['category[]'=> 4])}}">
                        <h1>Одежда</h1>
                    </a>
                </td>
            </tr>
            <tr class="">
                <td class="border-solid p-10 bg-[url(../image/nursery-1078923_1280.jpg)] bg-center bg-no-repeat bg-cover text-white rounded-3xl">
                    <a href="{{route('products', ['category[]'=> 5])}}">
                        <h1>Мебель</h1>
                    </a>
                </td>
                <td class="border-solid p-10 bg-[url(../image/books-5937716_1280.jpg)] bg-center bg-no-repeat bg-cover text-white rounded-3xl">
                    <a href="{{route('products', ['category[]'=> 8])}}">
                        <h1>Книги</h1>
                    </a>
                </td>
            </tr>
        </table>
    </div>

    <div class="text-center bg-[#FBF6F0] pb-10 px-20">
        <h1 class="text-4xl p-10">Популярные товары</h1>
        <div class="flex gap-10 justify-center flex-wrap">
            @foreach($productsPop as $product)
                <x-product-card :product="$product"/>
            @endforeach
        </div>
    </div>

    <div class="text-center bg-[#FBF6F0] pb-10 w-3/4 m-auto">
        <h1 class="text-4xl p-10">Бренды</h1>
        <div class="flex gap-10 justify-center flex-wrap">
            @for($i = 0; $i < 10; $i++)
                <a href="{{route('products', ['brand[]'=> $brands[$i]->id])}}" class="flex flex-col justify-between rounded-3xl">
                    <div class="inline content-center text-center h-48 bg-white rounded-3xl">
                        <img class="w-48" src="{{asset('brands/' . $brands[$i]->image)}}" alt="">
                    </div>
                    {{$brands[$i]->brand_name}}
                </a>
            @endfor
        </div>
    </div>
</x-app-layout>


