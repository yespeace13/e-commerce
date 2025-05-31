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
                <div>
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

                <div class="display flex col-span-4 gap-5 flex-wrap">
                    @foreach($products as $product)
                        <x-product-card class="min-w-80" :product="$product" />
                    @endforeach
                </div>
            </div>
        </form>
    </section>
</x-app-layout>