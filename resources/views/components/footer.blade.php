<footer class="footer">
    <div class="container">
        <div class="row footer-row-1">
            <div class="col-12 col-lg-3 mb-lg-0 mb-4 text-center">
                <img src="{{asset('build/static/img/home-logo.svg')}}" alt="">
                <span class="logo-subtitle d-block">Дарите эмоции!</span>
            </div>
            <div class="col-12 col-lg-4 text-center text-lg-start">
                <h3 class="footer-title">Сервис видеопоздравлений  от Деда  мороза</h3>
                <ul class="legal-info-list footer-menu">
                    <li>ТОО Collider Group</li>
                    <li>БИН: 220540047277</li>
                    <li>Республика Казахстан г.Алматы. Проспект Абая, Дом 52А</li>
                </ul>
                <br>
                <a style="text-decoration: underline;" href="https://wa.me/message/LHIU4JKRVSU7J1">Если  у вас возникнут вопросы можете связаться по WhatsApp &nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#fff" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg></a>
                <br>
                <br>

            </div>
            <div class="col-12 col-lg-2 mb-4 mb-lg-0">
                <ul class="text-center text-lg-start footer-menu">
                    <li><a href="{{route('public_offer')}}">Публичная оферта</a></li>
                    <li><a href="{{route('company_policy')}}">Политика компании</a></li>
                    <li><a href="{{route('payment_and_refund_policy')}}">Политика  оплаты
                        и возврата платежей</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-3 text-center">
                <a href="tel:77770430421" class="phone">+77770430421</a>
                <p class="mb-2">( по будням с 11 до 18 МСК )</p>
                <a href="mailto:{{config('mail.from.address')}}" class="email">{{config('mail.from.address')}}</a>

                <div class="d-flex align-items-center mt-4 justify-content-center mb-lg-0 mb-4">
                    <a class="me-2" href="#"><img src="{{asset('build/static/img/bank2.svg')}}" alt="VISA"></a>
                    <a class="me-2" href="#"><img src="{{asset('build/static/img/bank3.svg')}}" alt="Mastercard"></a>
                </div>
            </div>
        </div>
        <div class="row footer-row-2 text-center">
            <div class="d-flex justify-content-center col-12 col-lg-3 mb-3 mb-lg-0">
                Работает на платформе: <a href="https://massvideo.ru/"><img class="ms-2" src="{{asset('build/static/img/massvideo.png')}}" alt=""></a>
            </div>
            <div class="col-12 col-lg-3 mx-auto mb-3 mb-lg-0">
                <span class="madewithlove d-flex align-items-center justify-content-center">
                    <img src="{{asset('build/static/img/heart.svg')}}" alt="Heart">
                    Сделано с любовью
                </span>
            </div>
            <div class="col-12 col-lg-3 text-center mb-3 mb-lg-0">
                <span class="rights">© 2023 “Ayazata.kz”</span>
            </div>
        </div>
    </div>
</footer>
