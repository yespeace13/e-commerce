@php use Illuminate\Support\Facades\Auth; @endphp
<x-app-layout>
    <section class="flex flex-col justify-center pb-10 bg-red-50">
        <form method="GET" action="{{route('products')}}"
            class="px-20 pt-32 min-w-full text-center flex flex-col items-center gap-5">
            <div class="flex w-1/2">
                @php($s = request()->search)
                <x-text-input id="search" class="block mt-1 w-full" type="text" name="search" :value="$s" autofocus
                    autocomplete="username" />
                <x-primary-button class="ms-3">
                    {{ __('Поиск') }}
                </x-primary-button>

                @if(Auth::user() != null && Auth::user()->is_admin)
                    <x-nav-link class="text-nowrap ml-5" href="{{route('products.create')}}">
                        {{__('Добавить товар')}}
                    </x-nav-link>
                @endif
            </div>

            <div class="grid grid-cols-5 gap-14">
                <div class="">
                    <h1 class="text-4xl p-10">Фильтры:</h1>
                    <div>
                        <x-input-label class="text-xl" for="category" :value="__('Категории')" />
                        @php($name = 'category[]')
                        @foreach($categories as $category)
                        @if(request()->category != null)
                        @php($exist = in_array($category->id, request()->category))
                        @else
                        @php($exist = false)
                        @endif
                        @php($category['name'] = $category['category_name'])
                        <x-checkbox :name="$name" :item="$category" :checked="$exist" />
                        @endforeach
                    </div>
                    <div>
                        <x-input-label class="text-xl" for="subcategory" :value="__('Подкатегория')" />
                        @php($name = 'subcategory[]')
                        @foreach($subcategories as $subcategory)
                        @if(request()->subcategory != null)
                        @php($exist = in_array($subcategory->id, request()->subcategory))
                        @else
                        @php($exist = false)
                        @endif
                        @php($subcategory['name'] = $subcategory['category_name'])
                        <x-checkbox :name="$name" :item="$subcategory" :checked="$exist" />
                        @endforeach
                    </div>

                    <div>
                        <x-input-label class="text-xl" for="brand" :value="__('Бренды')" />
                        @php($name = 'brand[]')
                        @foreach($brands as $brand)
                        @if(request()->brand != null)
                        @php($exist = in_array($brand->id, request()->brand))
                        @else
                        @php($exist = false)
                        @endif
                        @php($brand['name'] = $brand['brand_name'])
                        <x-checkbox :name="$name" :item="$brand" :checked="$exist" />
                        @endforeach
                    </div>
                </div>

                <div
                    class="grid grid-rows-[min-content] xl:grid-cols-5 lg:grid-cols-4 gap-5 col-span-4 md:grid-cols-3 sm:grid-cols-2">
                    @foreach($products as $product)
                        <x-product-card class="col-span-1" :product="$product" />
                    @endforeach
                </div>
            </div>
        </form>
        {{csrf_field()}}
    </section>
    <script>
        async function addItem(productId) {
            console.log(productId)
            const url = new URL("/orders/add-item", window.location.origin).href;
            console.log(url)
            try {
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    },
                    body: JSON.stringify({
                        productId: productId
                    }),
                    credentials: 'same-origin' // Include cookies if needed
                });
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const data = await response.json();
                console.log("Success:", data);
            } catch (error) {
                console.error(error.message);
            }
        }

        // document.querySelectorAll('.item-button').forEach(item => {
        //     item.addEventListener('click', function() {
        //         addItem(item.id)
        //     });
        // })

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.item-button').forEach(item => {
                item.addEventListener('click', function () {
                    addItem(item.id); // Better than using ID
                });
            });
        });
    </script>
</x-app-layout>