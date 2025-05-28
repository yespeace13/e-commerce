<x-app-layout>
    <section class="pb-10 pt-32 flex justify-center flex-col gap-5">
        <h1 class="text-2xl text-center">Отчёты</h1>
        <div class="self-center flex gap-5">
            <form class="text-center" action="{{route('report')}}">
                <div class="text-left mt-4">
                    <x-input-label for="start_period" :value="__('Начало периода')"/>
                    <x-text-input id="start_period" class="block mt-1 w-full"
                                  type="date"
                                  name="start_period"
                                  required/>
                    {{--                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>--}}
                </div>

                <div class="text-left mt-4 mb-4">
                    <x-input-label for="end_period" :value="__('Конец периода')"/>
                    <x-text-input id="end_period" class="block mt-1 w-full"
                                  type="date"
                                  name="end_period"
                                  required/>
                    {{--                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>--}}
                </div>

                <div class="text-left mt-4">
                    <x-input-label for="type_report" :value="__('Отчёт')"/>
                    @php
                        $categories = [
                            'SALES' => 'Продажи товаров',
                            'CATEGORIES' => 'Продажи по категориям',
                            'STOCK' => 'Остатки товаров',
                        ]
                    @endphp
                    <select name="type_report" id="report-select"
                            class="block mt-1 w-full border-red-300 focus:border-red-300 rounded-md shadow-sm">
                        {{--                        <option value="">--Выберите категорию--</option>--}}
                        @foreach($categories as $category => $name)
                            <option name="sub_category_id"
                                    value="{{$category}}">{{$name}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('sub_category_id')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <button type="submit"
                            class="text-white text-xl bg-[#F8C46E] px-5 py-2 rounded-xl  hover:bg-red-500 focus:bg-red-500 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Продажи товаров
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
