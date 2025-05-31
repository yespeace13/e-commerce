<x-app-layout>

    <section class="grid grid-cols-5 items-center text-center m-auto justify-center gap-5 pt-32 mx-14 pb-5">
        <div class="flex flex-col gap-5 self-start col-span-1">
            <x-primary-button id="reportButton">Отчёты</x-primary-button>
            <x-primary-button id="orderButton">Заказы</x-primary-button>
            <x-primary-button id="categoriesButton">Категории</x-primary-button>
        </div>
        <div class="flex justify-center col-span-4">
            @include('reports')
            @include('orders-status')
            @include('categories.caterories')
        </div>
    </section>

    <script>
        const report = document.getElementById('report__section');
        const orders = document.getElementById('orders__status');
        const categories = document.getElementById('categories__section');

        document.getElementById('categoriesButton').addEventListener('click', function () {
            console.log('hide orders')
            report.style.display = 'none';
            orders.style.display = 'none';
            categories.style.display = 'block';
        });

        document.getElementById('reportButton').addEventListener('click', function () {
            console.log('hide orders')
            report.style.display = 'block';
            orders.style.display = 'none';
            categories.style.display = 'none';
        });

        document.getElementById('orderButton').addEventListener('click', function () {
            console.log('hide orders')
            report.style.display = 'none';
            orders.style.display = 'block';
            categories.style.display = 'none';
        });

    </script>
</x-app-layout>