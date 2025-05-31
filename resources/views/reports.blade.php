<div id="report__section" class="hidden">
    <h1 class="text-2xl text-center">Отчёты</h1>
    <div class="self-center flex gap-5">
        <form class="text-center" action="{{route('report')}}">
            <div class="text-left mt-4">
                <x-input-label for="start_period" :value="__('Начало периода')" />
                <x-text-input id="start_period" class="block mt-1 w-full" type="date" name="start_period" required />
            </div>

            <div class="text-left mt-4 mb-4">
                <x-input-label for="end_period" :value="__('Конец периода')" />
                <x-text-input id="end_period" class="block mt-1 w-full" type="date" name="end_period" required />
            </div>

            <div class="text-left mt-4">
                <x-input-label for="type_report" :value="__('Отчёт')" />
                @php
                    $categories = [
                        'SALES' => 'Продажи товаров',
                        'CATEGORIES' => 'Продажи по категориям',
                        'STOCK' => 'Остатки товаров',
                    ]
                @endphp
                <select name="type_report" id="report-select"
                    class="border-red-300 focus:border-red-300 rounded-md shadow-sm">
                    {{-- <option value="">--Выберите категорию--</option>--}}
                    @foreach($categories as $category => $name)
                        <option name="sub_category_id" value="{{$category}}">{{$name}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('sub_category_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-primary-button>Сформировать отчёт</x-primary-button>
            </div>
        </form>
    </div>
</div>