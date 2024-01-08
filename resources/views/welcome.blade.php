<x-layout>
    <x-slot:title>{{config('app.name')}}</x-slot:title>

    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 text-center d-none d-lg-block">
                    <img src="{{asset('build/static/img/home-logo.svg')}}" alt="Home logo">
                </div>
                <div class="col-lg-4 ms-auto text-center">
                    <span class="slogan">Дарите эмоции! :)</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="header__offer text-center">
                        <img class="d-block d-lg-none mb-5 mx-auto" src="{{asset('build/static/img/home-logo.svg')}}" alt="Home logo">
                        <h1 class="header__title">ПЕРСОНАЛЬНОЕ ВИДЕОПОЗДРАВЛЕНИЕ </h1>
                        <picture>
                            <source srcset="{{asset('build/static/img/header_title_mobile.png')}}" media="(max-width: 992px)">
                            <img src="{{asset('build/static/img/header_title_desktop.png')}}" alt="От деда мороза!">
                        </picture>
                        <div class="d-flex header__buttons mt-3 justify-content-center">
                            <a class="btn btn_style_red header__btn" href="{{route('order.create')}}">ПОПРОБОВАТЬ БЕСПЛАТНО</a>
                            <a class="btn btn_style_green header__btn" href="{{route('order.create')}}">ЗАКАЗАТЬ ПОЗДРАВЛЕНИЕ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="second">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h2 class="section-title d-block d-lg-none">В ГОСТЯХ У ДЕДА МОРОЗА</h2>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/zxuJSrXQHPE?si=mIw0Imcdgxy2AGEs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="section-title d-none d-lg-block">В ГОСТЯХ У ДЕДА МОРОЗА</h2>
                    <p class="section-text">
                        Погрузитесь в атмосферу волшебства вместе с нами и отправьтесь в гости к самому Деду Морозу!
                        Мы создадим для вашего ребенка персональное видео.
                        В этом видео Дед Мороз не только несколько раз обратится к вашему малышу по имени, но и с удовольствием рассмотрит его фотографии, выразит похвалу за его личные достижения. С помощью волшебной книги Дед Мороз внимательно оценит, как ваш ребенок себя вел в этом году, и подарит ценные наставления и пожелания на предстоящий год. <strong>Ваш ребенок будет в восторге от этой уникальной возможности встретиться с Дедом Морозом!</strong>
                    </p>
                    <div class="d-flex align-items-center flex-wrap justify-content-center justify-content-lg-start">
                        <a class="btn section-btn btn_style_green" href="{{route('order.create')}}">СОЗДАТЬ ВИДЕО</a>
                        <a class="btn btn_link" href="#">Посмотреть пример</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="third">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="text-center">
                        <p class="d-none d-lg-flex section-subtitle align-items-center justify-content-center">
                            <img src="{{asset('build/static/img/star.svg')}}" alt="star icon">
                            <span>Экспресс доставка: через 15 минут на Ваш E-mail</span>
                        </p>
                        <h1 class="section-title">ВИДЕОПОЗДРАВЛЕНИЕ УЖЕ ПОЛУЧИЛИ</h1>

                        <p class="secondary-text text-center d-block d-lg-none">
                            Последний заказ был изготовлен 6 минут назад
                            <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="13" height="8" viewBox="0 0 13 8" fill="none">
                                <path d="M12.3536 4.35355C12.5488 4.15829 12.5488 3.84171 12.3536 3.64645L9.17157 0.464466C8.97631 0.269204 8.65973 0.269204 8.46447 0.464466C8.2692 0.659728 8.2692 0.976311 8.46447 1.17157L11.2929 4L8.46447 6.82843C8.2692 7.02369 8.2692 7.34027 8.46447 7.53553C8.65973 7.7308 8.97631 7.7308 9.17157 7.53553L12.3536 4.35355ZM0 4.5H12V3.5H0V4.5Z" fill="#6F6F6F"/>
                              </svg>
                        </p>
                   </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="slider">
                        <div class="slide">
                            <div>
                                <img class="slide__img"  style="object-fit: cover" src="{{asset('build/static/img/photo2.jpg')}}" alt="">
                                <div class="slide__body">
                                    <h3 class="slide__title">Поздравление для Дианы </h3>
                                    <span class="slide__time">6 минут назад из г. Астана</span>
                                    <p class="slide__desc">
                                        Дед Мороз посмотрит 3 фотографии, заинтригует подарком-сюрпризом.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="slide">
                            <div>
                                <img class="slide__img" style="object-fit: cover" src="{{asset('build/static/img/photo1.jpg')}}" alt="">
                                <div class="slide__body">
                                    <h3 class="slide__title">Поздравление для Эмира </h3>
                                    <span class="slide__time">6 минут назад из г. Алматы</span>
                                    <p class="slide__desc">
                                        Дед Мороз посмотрит 4 фотографии, отметит его рисование, похвалит заповедение, заинтригует подарком-сюрпризом. </p>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="slide">
                            <div>
                                <img class="slide__img"  style="object-fit: cover" src="{{asset('build/static/img/photo1.jpg')}}" alt="">
                                <div class="slide__body">
                                    <h3 class="slide__title">Поздравление для Эмира </h3>
                                    <span class="slide__time">13 минут назад из г. Алматы</span>
                                    <p class="slide__desc">
                                        Дед Мороз посмотрит 4 фотографии, отметит его рисование, похвалит заповедение, заинтригует подарком-сюрпризом. </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="d-none d-sm-block d-lg-none section-subtitle d-flex align-items-center justify-content-center">
                        <img src="{{asset('build/static/img/star.svg')}}" alt="star icon">Экспресс доставка: через 15 минут на Ваш E-mail
                    </p>

                    <p class="secondary-text text-center d-none d-lg-block">
                        Последний заказ был изготовлен 6 минут назад
                        <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="13" height="8" viewBox="0 0 13 8" fill="none">
                            <path d="M12.3536 4.35355C12.5488 4.15829 12.5488 3.84171 12.3536 3.64645L9.17157 0.464466C8.97631 0.269204 8.65973 0.269204 8.46447 0.464466C8.2692 0.659728 8.2692 0.976311 8.46447 1.17157L11.2929 4L8.46447 6.82843C8.2692 7.02369 8.2692 7.34027 8.46447 7.53553C8.65973 7.7308 8.97631 7.7308 9.17157 7.53553L12.3536 4.35355ZM0 4.5H12V3.5H0V4.5Z" fill="#6F6F6F"/>
                          </svg>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="banner">

        <picture>
            <source srcset="{{asset('build/static/img/x-mas-tree-mobile-2.png')}}" media="(max-width: 768px)">
            <img class="bgel bgel1" src="{{asset('build/static/img/Ded-Moroz-and-Snegurochka.png')}}" alt="">
        </picture>

        <picture>
            <source srcset="{{asset('build/static/img/x-mas-tree-mobile.png')}}" media="(max-width: 768px)">
            <img src="{{asset('build/static/img/x-mas-tree.png')}}" class="bgel bgel2" alt="Christmas tree">
        </picture>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title text-center banner__title">
                        ХОТИТЕ ПОЗДРАВИТЬ РЕБЁНКА ПОЗЖЕ?
                    </h2>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn_style_green banner__btn">НАПОМНИТЬ О НАС</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer></x-footer>

    <x-slot:customjs>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $('.slider').slick({
                infinite: false,
                slidesToShow: 2,
                slidesToScroll: 1,
                prevArrow:`<svg class="slider__btn slider__btn_left" xmlns="http://www.w3.org/2000/svg" width="43" height="42" viewBox="0 0 43 42" fill="none">
                    <path d="M42 21.2177C42 31.8817 32.8721 40.6152 21.5 40.6152C10.1279 40.6152 1 31.8817 1 21.2177C1 10.5538 10.1279 1.82031 21.5 1.82031C32.8721 1.82031 42 10.5538 42 21.2177Z" fill="white" stroke="white" stroke-width="2"/>
                    <path d="M24.5 16L19 21.2179L24.5 26.4359" stroke="black" stroke-width="2"/>
                    </svg>
                    `,
                nextArrow:`<svg class="slider__btn slider__btn_right" xmlns="http://www.w3.org/2000/svg" width="43" height="42" viewBox="0 0 43 42" fill="none">
                    <path d="M42 21.2177C42 31.8817 32.8721 40.6152 21.5 40.6152C10.1279 40.6152 1 31.8817 1 21.2177C1 10.5538 10.1279 1.82031 21.5 1.82031C32.8721 1.82031 42 10.5538 42 21.2177Z" fill="white" stroke="white" stroke-width="2"/>
                    <path d="M19.5 16L25 21.2179L19.5 26.4359" stroke="black" stroke-width="2"/>
                    </svg>
                    `,
                responsive: [
                    {
                        breakpoint: 1170,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        </script>
    </x-slot:customjs>
</x-layout>
