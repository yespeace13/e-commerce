@php use Illuminate\Support\Facades\Auth; @endphp
<x-app-layout>
    <section class="">
        <div class="flex flex-col justify-center mx-36 mt-36 gap-10 mb-10">
            <div class="grid grid-cols-2 gap-24">
                <div class="">
                    <img class="rounded-3xl" height="100%" width="100%" src="{{asset('storage/'.$product->image_url)}}"
                         alt="">
                </div>
                <div class="flex flex-col justify-around">
                    <div class="inline-flex flex-col gap-5">
                        <div class="inline-flex gap-2 flex-col">
                            <p class="text-4xl">{{$product->product_name}}</p>
                            <p class="text-3xl">Цена: {{$product->price}}₽</p>
                        </div>
                        <div class="inline-flex flex-col gap-2">
                            <p class="">{{$product->subCategory()->get()->first()->category_name}}</p>
                            <p class="">Для {{$product->age_group}}</p>
                            <p class="">Описание: {{$product->description}}</p>
                            <p class="">Производитель: {{$product->brand()->get()->first()->brand_name}}</p>
                        </div>
                    </div>
                    <div class="inline-flex justify-center gap-5">
                        <input value="{{$product->id}}" id="productId" name="productId" class="hidden">
                        @if(Auth::user() != null && Auth::user()->is_admin)
                            <form method="GET" action="{{route('products.edit', ['id'=>$product->id])}}">
                                @csrf
                                <x-primary-button>{{ __('Изменить') }}</x-primary-button>
                            </form>
                            <form method="POST" action="{{route('products.delete', $product->id)}}">
                                @csrf
                                @method("DELETE")
                                <x-primary-button>{{ __('Удалить') }}</x-primary-button>
                            </form>
                        @else
                            <form method="POST" class="flex gap-2 justify-center text-center"
                                  action="{{route('orders.add')}}">
                                @csrf
                                @if($product->stock_quantity > 0)
                                    <input hidden name="productId" value="{{ $product->id }}">
                                    <x-text-input id="quantity" :value="1" min="1" max="{{$product->stock_quantity}}"
                                                  class="block mt-1 w-20" type="number" name="quantity" pattern="[0-9]*"
                                                  inputmode="numeric"/>
                                    <x-primary-button>{{ __('В корзину') }}</x-primary-button>
                                @else
                                    <p>Нет в наличии</p>
                                @endif
                            </form>
                        @endif
                    </div>
                </div>

            </div>

            <div class="inline-flex flex-col justify-center items-center gap-5">
                <h1 class="text-4xl">ОТЗЫВЫ</h1>
                <div class="inline-flex gap-5 justify-center flex-col">
                    @php($reviews = $product->reviews()->get()->sortByDesc('created_at'))
                    @foreach($reviews as $review)
                        @php($user = $review->user()->get()->first())
                        <div class="bg-[#D3EDEF] rounded-2xl max-w-[600px] w-full p-5 flex flex-col gap-5">
                            <div class="flex justify-between">
                                <p>{{$user->last_name}} {{$user->first_name}}</p>
                                <p>{{date("H:i d M Y" , strtotime($review->created_at))}}</p>
                            </div>
                            <p class="text-wrap">{{$review->comment}}</p>
                            <div class="flex gap-1 justify-between">
                                <div class="flex gap-1 flex-row">
                                    @for($i = 0; $i< $review->rating; $i++)
                                        <img width="24px" class="" src="{{asset('rating.png')}}" alt="">
                                    @endfor
                                    @for($i = 0; $i< 5 - $review->rating; $i++)
                                        <img width="24px" class="opacity-50" src="{{asset('rating.png')}}" alt="">
                                    @endfor
                                </div>
                                <div>
                                    @if(Auth::user()!= null && Auth::user()->is_admin)
                                        <form method="POST" action="{{route('review.destroy', $review->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <img width="24px" src="{{asset('/icons/icons8-remove-48.png')}}">
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center w-1/2">
                    <x-primary-button onclick="showReview()">
                        {{__('Оставить отзыв')}}
                    </x-primary-button>
                    <form id="review-form" class="self-center" action="{{route('review.create')}}" method="POST">
                        @csrf
                        <input class="hidden" value="{{$product->id}}" name="product_id">
                        <input class="hidden" id="rating-number" value="5" name="rating">
                        <div class="mt-4">
                            <textarea name="comment"
                                      class="border-red-300 focus:border-red-300 rounded-md shadow-sm resize-none w-full"
                                      rows="5">
                            </textarea>
                        </div>
                        <div id="rating" class="flex gap-1 justify-center mt-4">
                            @for($i = 0; $i< 5; $i++)
                                <img onclick="setRating({{$i}})"
                                     class="rating opacity-50 transition-opacity hover:opacity-100 active:opacity-100"
                                     width="36px"
                                     src="{{asset('rating.png')}}" alt="">
                            @endfor
                        </div>
                        <div class="mt-4 flex justify-center">
                            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center pb-10">
                <h1 class="text-4xl p-10">Также ищут</h1>
                <div class="flex gap-10 justify-center flex-wrap">
                    @foreach($products as $product)
                        <x-product-card :product="$product"/>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <style>
        .rating:hover,
        .rating.active {
            opacity: 1;
        }
    </style>

    <script>
        const form = document.getElementById('review-form')
        const ratingNumber = document.getElementById('rating-number')
        form.hidden = true

        function showReview() {
            form.hidden = !form.hidden
        }

        function setRating(rating) {
            const images = document.querySelectorAll('.rating');
            let value = 0;
            images.forEach((img, index) => {
                img.classList.remove('active');
                if (index <= rating) {
                    img.classList.add('active');
                    value++;
                }
            });
            ratingNumber.value = value
        }
    </script>
</x-app-layout>
