<x-app-layout>
    <section class="bg-[#FBF6F0] flex pt-32 justify-around">
        <div class="flex flex-col justify-center">
            @if(sizeof($order->getItems())>0)
                @foreach($order->getItems() as $item)
                    @php($product = $item->getProduct())
                    <div class="flex gap-10 h-fit bg-white p-5 rounded-3xl">
                        <a class="w-1/5 object-contain" href="{{route('products.show', $product->id)}}">
                            <img class="h-28 object-contain rounded-3xl" src="{{asset('/storage/'.$product->image_url)}}" alt="">
                        </a>
                        <div class="w-2/5">
                            <p class="text-xl">{{$product->product_name}}</p>
                            <p class="opacity-60">{{$product->subCategory()->get()->first()->category_name}}</p>
                            <p class="opacity-60">{{$product->brand()->get()->first()->brand_name}}</p>
                        </div>
                        <div class="w-1/5">
                            <p class="text-xl">{{$product->price}} ₽</p>
                            <p>{{$item->getPriceAtPurchase()}} ₽</p>
                        </div>
                        <div class="flex flex-col gap-5">
                            {{csrf_field()}}
                            <x-text-input id="quantity" :value="1" min="1" max="{{$product->stock_quantity}}"
                                          class="block mt-1 w-24" type="number" name="quantity" pattern="[0-9]*"
                                          :value="$item->getQuantity()" inputmode="numeric"
                                          onchange="changeCount({{$product->id}}, this.value)"/>
                            <x-primary-button
                                onclick="removeItem({{$product->id}})">{{ __('Удалить') }}</x-primary-button>
                        </div>
                    </div>
                    <br>
                @endforeach
            @else
                <h1>У вас нет товаров</h1>
            @endif
        </div>
        @if(sizeof($order->getItems())>0)
            <div class="p-5 text-right bg-white rounded-3xl h-fit">
                <p class="mb-5">
                    Итого: {{$order->getTotal()}}
                </p>
                <form action="{{route('purchase')}}">
                    @csrf
                    <x-primary-button>{{ __('Перейти к оформлению') }}</x-primary-button><br>
                </form>
            </div>
        @endif
    </section>
</x-app-layout>

<script>
    async function removeItem(productId) {
        const url = window.location.protocol + '//' + window.location.host + "/orders/remove-item";
        console.log(url)
        try {
            const response = await fetch(url, {
                method: "POST",
                // mode: "no-cors",
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    "X-CSRF-Token": document.querySelector('input[name=_token]').value,
                },
                body: JSON.stringify({
                    productId: productId
                })
            });
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            } else {
                window.location.reload()
            }
        } catch (error) {
            console.error(error.message);
        }
    }

    async function changeCount(productId, quantity) {
        const url = window.location.protocol + '//' + window.location.host + "/orders/change-quantity";
        console.log(url)
        try {
            const response = await fetch(url, {
                method: "POST",
                // mode: "no-cors",
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    "X-CSRF-Token": document.querySelector('input[name=_token]').value,
                },
                body: JSON.stringify({
                    productId: productId,
                    quantity: quantity
                })
            });
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            } else {
                window.location.reload()
            }
        } catch (error) {
            console.error(error.message);
        }
    }
</script>
