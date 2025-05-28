@props(['product'])
<a href="{{route('products.show', $product->id)}}"
    class="bg-white overflow-hidden w-52 px-5 pt-5 pb-10 rounded-3xl h-96">
    <img src="{{asset('storage/' . $product->image_url)}}" alt="Product Image" class="h-3/4 object-contain">
    <div class="p-4">
        <p class="overflow-hidden w-full text-ellipsis whitespace-nowrap text-nowrap">{{$product->product_name}}</p>
        <p>{{$product->price}}₽</p>
        @if($product->stock_quantity > 0)
            <form action="{{ route('orders.add') }}" method="POST">
                @csfr
                <x-primary-button class="item-button">{{ __('В корзину') }}</x-primary-button>
                <input hidden name="productId" value="{{ $product->id }}">
            </form>
        @else
            <p>Нет в наличии</p>
        @endif
    </div>
</a>