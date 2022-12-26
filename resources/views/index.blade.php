@extends('layouts.app')
@section('content')



                <div class="index-head-bg">
                    <div class="index-head-bg__text">
                        <h1>Забронируйте по выгодной цене отель, апартаменты, хостел</h1>
                        <p>Цены на нашем сайте вас приятно удивят.</p>
                    </div>
                </div>
<div class="block-search">
    <div class="block-search-form">
        <Search_form_top></Search_form_top>
    </div>
</div>

                <main class="block-main">
                    <section class="section-item">
                        @include('.components.carusel.index')
                    </section>

                    <section class="section-item">
                        <article class="section-item-article">
                            <div class="section-item-article__img"></div>
                            <h2 class="section-item-article__h1">О нас</h2>
                            <div class="article section-item-article__text">
                                <p>Кмпания <strong>MoreOtdih.ru</strong>, основанная в 2020 году в России. Миссия <strong>MoreOtdih.ru</strong>, , —делать путешествия доступными каждому.</p>
                                <p> Инвестируя в технологии, которые помогают путешествовать без хлопот,  <strong>MoreOtdih.ru</strong> предлагает миллионам гостей потрясающие варианты досуга, невероятное жилье, начиная от домов и заканчивая  отелями и не только.  <strong>MoreOtdih.ru</strong> помогает владельцам объектов размещения по всему миру  привлекать гостей и расширять бизнес.</p>
                                <p> На <strong>MoreOtdih.ru</strong>  доступно для  бронирования единиц размещения, среди  которых дома, апартаменты и другие уникальных  объектах размещения. Куда бы вы ни отправились и чем бы ни захотели  заняться, <strong>MoreOtdih.ru</strong> поможет вам в этом. Служба поддержки компании  работает круглосуточно и без выходных.</p>

                            </div>
                            <div class="article section-item__autor"></div>
                        </article>
                    </section>

                    <section class="section-item">
                        <article class="section-item__article">
                            <div class="section-item__img"></div>
                            <h2 class="section-item__h1">Как подключиться</h2>
                            <div class="article section-item__text">

                            </div>
                            <div class="article section-item__autor"></div>
                        </article>
                    </section>

                </main>
@endsection
