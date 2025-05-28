<x-app-layout>
    <section class="flex justify-center pb-10 bg-red-50">
        <div class="px-20 pt-32 min-w-full text-center">
            <h1 class="text-4xl pb-5">Все бренды</h1>
            <div class="flex flex-wrap gap-5 text-center justify-center">
                @foreach($brands as $brand)
                    <a href="{{route('products', ['brand[]' => $brand->id])}}" class="flex flex-col justify-between">
                        <div class="inline content-center text-center h-48 bg-white">
                            <img class="w-48" src="{{asset('brands/' . $brand->image)}}" alt="">
                        </div>
                        {{$brand->brand_name}}
                    </a>
                @endforeach
            </div>
        </div>

    </section>
</x-app-layout>
