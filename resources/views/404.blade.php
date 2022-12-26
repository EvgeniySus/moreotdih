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
                        <h2 class="title-error-page">404</h2>
                        @if($errors->any())
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div  class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong> {{ $errors->first() }}</strong>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </section>

                </main>
@endsection
