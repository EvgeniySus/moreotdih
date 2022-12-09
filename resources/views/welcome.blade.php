@extends('layouts.app')
@section('content')
    <template>

        <div class="flex-center position-ref full-height">
            <div class="content">
                <logo></logo>

                {{ Config::get('site.META')  }}
            </div>
        </div>

    </template>
@endsection
