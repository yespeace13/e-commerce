<div id="orders__status">
    <div class="self-center">
        <table class="table-auto border-spacing-5 border-separate bg-white rounded-xl shadow">
            <thead>
                <tr class="border-green-700">
                    <th>Номер заказа</th>
                    <th>Дата заказа</th>
                    <th>Стоимость заказа</th>
                    <th>Статус заказа</th>
                    <th>Изменить статус</th>
                    <th>Управление заказом</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                @php($items = $order->orderItems()->get())
                @php($total = $items->sum('price_at_purchase'))
                <tr class="text-center border-green-700">
                    <td class="border-green-700">{{ $order->id }}</td>
                    <td>{{ date("H:i d.m.Y", strtotime($order->order_date)) }}</td>
                    <td>{{ $total}}</td>
                    <td>{{ $order->orderStatus()->get()->first()->name }}</td>
                    <td>
                        <form action="{{route('admin.complete')}}" method="POST">
                            @csrf
                            @php($statusId = $order->orderStatus()->get()->first()->id)
                            @if($statusId != 4 && $statusId != 5)
                                <input name="order_id" value="{{$order->id}}" class="hidden">
                                <x-primary-button class="text-wrap w-fit">{{ __('Завершить') }}</x-primary-button>
                            @else
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-gray-400 cursor-not-allowed border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                                    disabled>{{ __('Завершить') }}</button>
                            @endif
                        </form>
                    </td>
                    <td>
                        <form action="{{route('admin.remove')}}" method="POST">
                            @csrf
                            @php($statusId = $order->orderStatus()->get()->first()->id)
                            @if($statusId != 4 && $statusId != 5)
                                <input name="order_id" value="{{$order->id}}" class="hidden">
                                <x-primary-button class="text-wrap w-fit">{{ __('Отменить') }}</x-primary-button>
                            @else
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-gray-400 cursor-not-allowed border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                                    disabled>{{ __('Отменить') }}</button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>