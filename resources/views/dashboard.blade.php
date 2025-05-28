<x-app-layout>
    <section class="bg-[#FBF6F0] flex pt-32 justify-around">
        <div class="flex flex-col justify-center w-3/4">
            @if(sizeof($orders)>0)
                @foreach($orders as $order)
                    @php($items = $order->orderItems()->get())
                    <div class="bg-white gap-5 flex flex-col rounded-3xl mb-10 p-5 leading-tight shadow">
                        <div class="flex justify-between">
                            <h1 class="text-xl font-bold">Заказ от {{date("d.m" , strtotime($order->order_date))}}
                                № {{$order->id}}</h1>
                            @php($total = $items->sum('price_at_purchase'))
                            @if($order->order_status_id === 1)
                                <h1>Продолжите покупку на сумму <span
                                        class="text-xl font-normal">{{$total}} ₽</span></h1>
                                <a href="{{route('purchase')}}" class="" >Продолжить покупку</a>
                            @elseif($order->order_status_id === 2)
                                <h1>Оплачено <span
                                        class="text-xl font-normal">{{$total}} ₽</span></h1>
                            @elseif($order->order_status_id === 3)
                                <h1>Заказ не завершен на сумму <span
                                        class="text-xl font-normal">{{$total}} ₽</span></h1>
                                <form method="GET" action="{{route('purchase')}}">
                                    @csrf
                                    <input name="order_id" value="{{$order->id}}" class="hidden">
                                    <x-primary-button class="text-wrap w-fit">{{ __('Продолжить') }}</x-primary-button>
                                </form>
                            @endif
                        </div>
                        <div class="flex gap-5">
                            @foreach($items as $item)
                                <div class="flex flex-row gap-10 h-fit">
                                    @php($product = $item->product()->get()->get(0))
                                    <a class="object-contain" href="{{route('products.show', $product->id)}}">
                                        <img class="h-28 object-contain rounded-3xl"
                                             src="{{asset('/storage/'.$product->image_url)}}" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <h1>У вас нет товаров</h1>
            @endif
        </div>
    </section>
</x-app-layout>
