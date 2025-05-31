<div hidden id="categories__section" class="display">
    <form action="{{ route('categories.create') }}" method="GET">
        <x-primary-button class="mb-5">Добавить категорию</x-primary-button>
    </form>
    <div class="self-center">
        <table class="table-auto border-spacing-5 border-separate bg-white rounded-xl shadow">
            <thead>
                <tr class="border-green-700">
                    <th>Номер</th>
                    <th>Название</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories_sales as $category)
                    <tr class="text-center border-green-700">
                        <td>{{ $category->id}}</td>
                        <td>{{ $category->category_name}}</td>
                        <td>
                            <form action="{{route('categories.edit', $category->id)}}" method="GET">
                                @csrf
                                <x-primary-button class="text-wrap w-fit">{{ __('Изменить') }}</x-primary-button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('categories.destroy', $category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="text-wrap w-fit">{{ __('Удалить') }}</x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>