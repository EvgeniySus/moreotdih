@extends('layouts.app')
@section('content')
   <section class="search-block-all-page">
        <div class="block-search">
            <div class="block-search-form">
                <Search_form_top></Search_form_top>
            </div>
        </div>
   </section>
    <main class="block-main">
       <article role="main">

           <h1>{{$view->hotel->title}}</h1>

           <address>{{$view->hotel->adres}}</address>
           <div role="anons">
               {{$view->hotel->about}}
           </div>

           <div role="img" aria-label="Фотографии отеля {{$view->hotel->title}}"></div>

           <div class=""><h2>Расположение отеля</h2>
           {!! $view->hotel->location !!}
           </div>

           <div role="article">{!!$view->hotel->body!!} </div>


            <section role="hotel-list-room">
                <section class="search-block-all-page">
                    <div class="block-search">
                        <div class="block-search-form">
                            <Search_form_top  :hotel="[7,'Олимпия Сочи', '{{$view->servdata}}']"></Search_form_top>
                        </div>
                    </div>
                </section>
<section class="hotel-prise">
    <hotelprice :hotelid="{{$view->hotel->id}}"></hotelprice>

</section>


            </section>

           <section role="hotel-services">
               <h2>Услуги и удобстава отеля</h2>

               <servises_hotel :sevise_list="{{$view->hotel->services}}" :groupservise="{{$view->groupservise}}" key="serv_hotel_page">

               </servises_hotel>

           </section>

           <el-collapse accordion>
               <el-collapse-item title="Питание " name="1">
                   <template slot="title">
                       Питание <i class="header-icon el-icon-info"></i>
                   </template>
                   <div>{{$view->hotel->nutrition}}</div>
               </el-collapse-item>
               <el-collapse-item title="Размещение детей" name="2">
                   <template slot="title">
                       Размещение детей <i class="header-icon el-icon-info"></i>
                   </template>
                   <div>{{$view->hotel->children}}</div>
               </el-collapse-item>
               <el-collapse-item title="Особые условия" name="3">
                   <template slot="title">
                       Особые условия <i class="header-icon el-icon-info"></i>
                   </template>
                   <div>{{$view->hotel->special}}</div>
               </el-collapse-item>
               <el-collapse-item title="Дополнительно" name="4">
                   <template slot="title">
                       Дополнительно <i class="header-icon el-icon-info"></i>
                   </template>
                   <div>{{$view->hotel->additionally}}</div>
               </el-collapse-item>
           </el-collapse>


       </article>




    </main>
@endsection
