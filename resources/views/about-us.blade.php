<x-app-layout>
    <section class="pb-10 pt-32 flex justify-center">
        <div class="w-3/5 self-center flex flex-col gap-5">
            <h1 class="text-4xl pb-5 text-center">Добро пожаловать в интернет-магазин детских товаров "Неваляшка"!</h1>
            <div class="bg-white rounded-3xl p-5 ">
                <p>
                    Мы — команда, которая заботится о самом важном в вашей жизни — о ваших детях. Наша миссия
                    заключается в том, чтобы предложить родителям качественные, безопасные и удобные товары, которые
                    делают детство счастливым, а заботу о ребенке — легкой и приятной.
                </p>
            </div>

            <div class="bg-white p-5 rounded-3xl">
                <h2 class="text-xl mb-3">Почему выбирают нас?</h2>
                <ul class="flex flex-col gap-2">
                    <li><span class="font-bold">Широкий ассортимент:</span> В нашем магазине вы найдете все необходимое
                        — от игрушек и
                        одежды до товаров для ухода за малышами.
                    </li>
                    <li><span class="font-bold">Качество и безопасность:</span> Мы работаем только с проверенными
                        производителями, чтобы
                        гарантировать безопасность каждого товара.
                    </li>
                    <li><span class="font-bold">Доступные цены:</span> Мы стараемся, чтобы наши товары были по карману
                        каждой семье.
                    </li>
                    <li><span class="font-bold">Удобный сервис:</span> Быстрая доставка, удобный поиск и
                        квалифицированная поддержка — все
                        для вашего максимального комфорта.
                    </li>
                </ul>
            </div>

            <div class="bg-white p-5 rounded-3xl">
                "Неваляшка" — это место, где родители и дети находят все необходимое для радостного и беззаботного
                детства. Спасибо, что выбираете нас!
            </div>

            <div class="bg-white p-5 rounded-3xl">
                <h2 class="text-xl text-center mb-3">Часто задаваемые вопросы (FAQ)</h2>
                <ul class="flex flex-col gap-3 ">
                    <li class="">
                        <div class="accordion-header font-bold cursor-pointer flex justify-between">
                            <div>Как оформить заказ?</div>
                        </div>
                        <div
                            class="accordion-content hidden transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
                            Оформить заказ просто: добавьте понравившиеся товары в корзину и следуйте инструкциям на
                            странице оформления. Если у вас возникли вопросы, наша служба поддержки всегда готова
                            помочь.
                        </div>
                    </li>
                    <li>
                        <div class="accordion-header font-bold cursor-pointer">Какие способы оплаты доступны?</div>
                        <div
                            class="accordion-content hidden transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
                            Мы принимаем оплату банковскими картами, электронными
                            кошельками, а также предлагаем возможность оплаты при получении (наличными или картой).
                        </div>
                    </li>
                    <li>
                        <div class="accordion-header font-bold cursor-pointer">Как быстро происходит доставка?</div>
                        <div
                            class="accordion-content hidden transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
                            Сроки зависят от вашего региона. Обычно доставка
                            занимает от 1 до 5 рабочих дней. Мы также предлагаем экспресс-доставку в крупных городах.
                        </div>
                    </li>
                    <li>
                        <div class="accordion-header font-bold cursor-pointer">Могу ли я вернуть товар?</div>
                        <div
                            class="accordion-content hidden transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
                            Да, конечно! Вы можете вернуть товар в течение 14 дней с
                            момента получения, если он не был в использовании и сохранен товарный вид. Подробнее о
                            политике возвратов читайте на странице "Условия возврата".
                        </div>
                    </li>
                    <li>
                        <div class="accordion-header font-bold cursor-pointer">Как связаться с поддержкой?</div>
                        <div
                            class="accordion-content hidden transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
                            Вы можете написать нам по электронной почте
                            (support@nevalyashka.ru) или позвонить по телефону, указанному в разделе "Контакты". Мы
                            всегда рады помочь!
                        </div>
                    </li>
                </ul>
            </div>

            <hr>
            <div class="bg-white p-5 rounded-3xl">
                Если у вас остались вопросы или нужна помощь, не стесняйтесь обращаться — мы всегда на связи и
                готовы сделать все, чтобы ваши покупки в "Неваляшке" были максимально удобными и приятными! 😊
            </div>
        </div>
    </section>
    <script>
        const accHeaders = document.querySelectorAll('.accordion-header');
        accHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const content = header.nextElementSibling;
                const isHidden = content.classList.contains('hidden');

                if (isHidden) {
                    content.classList.remove('hidden');
                    content.style.maxHeight = content.scrollHeight + "px"; // Устанавливаем максимальную высоту для анимации
                } else {
                    content.style.maxHeight = null; // Сбрасываем максимальную высоту
                    setTimeout(() => content.classList.add('hidden'), 300); // Добавляем класс hidden после завершения анимации
                }
            });
        });

    </script>
</x-app-layout>
