<x-guest-layout>
    <section class="">
        <form class="self-center" action="{{route('categories.store')}}" method="POST">
            @csrf
            <h1 class="text-center mb-5 text-xl">Категория</h1>

            <div class="mt-4">
                <x-input-label for="category_name" :value="__('Название')" />
                <x-text-input class="block mt-1 w-full" type="text" name="category_name" required />
                <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
            </div>

            <div class="mt-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">Подкатегории</h2>
                    <x-primary-button onclick="addSubcategoryRow()">
                        + Добавить подкатегорию
                    </x-primary-button>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b">Название</th>
                                <th class="py-2 px-4 border-b w-20">Действия</th>
                            </tr>
                        </thead>
                        <tbody id="subcategories-table">
                            
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="mt-4 flex justify-between align-middle">
                <x-input-label :value="\Session::get('status')" class="mt-2" />
                <x-input-error :messages="\Session::get('error')" class="mt-2" />
                <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                        Отмена
                    </a>
                <x-primary-button>{{ __('Сохранить изменения') }}</x-primary-button>
            </div>
        </form>
    </section>

    <script>
        let rowCount = 0;

        function addSubcategoryRow() {
            const table = document.getElementById('subcategories-table');
            const newRow = document.createElement('tr');
            newRow.className = 'subcategory-row';
            newRow.innerHTML = `
                <td class="py-2 px-4 border-b">
                    <input type="hidden" name="subcategories[${rowCount}][id]" value="new">
                    <x-text-input class="block w-full" type="text" 
                                  name="subcategories[${rowCount}][name]" required />
                </td>
                <td class="py-2 px-4 border-b text-center">
                    <button type="button" onclick="removeRow(this)" 
                            class="text-red-500 hover:text-red-700">
                        Удалить
                    </button>
                </td>
            `;
            table.appendChild(newRow);
            rowCount++;
        }

        function removeRow(button) {
            const row = button.closest('.subcategory-row');
            row.remove();
        }
    </script>
</x-guest-layout>