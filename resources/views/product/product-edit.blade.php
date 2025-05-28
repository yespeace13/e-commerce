<x-guest-layout>
    <section class="">
        <form class="self-center" action="{{route('products.edit', $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center mb-5 text-xl">Товар</h1>

            <div class="mt-4">
                <x-input-label for="image" :value="__('Название')"/>
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                              onchange="loadFile(event)" alt=""
                              accept="image/jpeg, image/png"/>
                <img class=" w-full object-cover" id="downloaded" src="{{asset('storage/'.$product->image_url)}}" alt=""/>
                <x-input-error :messages="$errors->get('image')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="product_name" :value="__('Название')"/>
                <x-text-input class="block mt-1 w-full" type="text" name="product_name" :value="$product->product_name"
                              required/>
                <x-input-error :messages="$errors->get('product_name')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Описание')"/>
                <textarea
                    class="border-red-300 focus:border-red-300 rounded-md shadow-sm resize-none w-full"
                    rows="5">{{$product->description}}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="price" :value="__('Цена')"/>
                <x-text-input class="block mt-1 w-full" type="number" name="price" :value="$product->price" min="0"
                              step="0.01"
                              required/>
                <x-input-error :messages="$errors->get('price')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="sub_category_id" :value="__('Категория')"/>
                <select name="sub_category_id" id="pet-select"
                        class="block mt-1 w-full border-red-300 focus:border-red-300 rounded-md shadow-sm">
                    <option value="">--Выберите категорию--</option>
                    @foreach($categories as $category)
                        @if($category->id == $product->sub_category_id)
                            <option name="sub_category_id" value="{{$category->id}}" selected>{{$category->category_name}}</option>
                        @else
                            <option name="sub_category_id" value="{{$category->id}}">{{$category->category_name}}</option>
                        @endif
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('price')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="stock_quantity" :value="__('Количество')"/>
                <x-text-input class="block mt-1 w-full" type="number" name="stock_quantity"
                              :value="$product->stock_quantity" min="0"
                              step="1"
                              required/>
                <x-input-error :messages="$errors->get('price')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="age_group" :value="__('Возрастная группа')"/>
                <x-text-input class="block mt-1 w-full" type="text" name="age_group" :value="$product->age_group"
                              required/>
                <x-input-error :messages="$errors->get('age_group')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="brand_id" :value="__('Бренд')"/>
                <select name="brand_id" class="block mt-1 w-full border-red-300 focus:border-red-300 rounded-md shadow-sm">
                    <option value="">--Выберите бренд--</option>
                    @foreach($brands as $brand)
                        @if($brand->id == $product->brand_id)
                            <option value="{{$brand->id}}" selected>{{$brand->brand_name}}</option>
                        @else
                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                        @endif
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('price')" class="mt-2"/>
            </div>

            <div class="mt-4 flex justify-between align-middle">
                <x-input-label :value="\Session::get('status')" class="mt-2"/>
{{--                <form action="{{route('products.show', $product->id)}}">--}}
{{--                    <x-primary-button>{{ __('Назад') }}</x-primary-button>--}}
{{--                </form>--}}
                <x-primary-button>{{ __('Сохранить изменения') }}</x-primary-button>
            </div>
        </form>
    </section>
    <script>
        const loadFile = function (event) {
            const image = document.getElementById('downloaded');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</x-guest-layout>
