@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$pageTitle}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('form_blocks.errors')
                @include('form_blocks.session_info')
            </div>
        </div>
        <div class="row">
            <parcel
                action-save="{{$actionSave}}"
                domestic-per-km="{{config('app.domestic_per_km')}}"
                international-per-km="{{config('app.international_per_km')}}"
                csrf-token="{{csrf_token()}}"
                method="{{$method or null}}"
                @if(isset($parcel))
                    :parcel="{{$parcel}}"
                    @else
                        parcel="{{null}}"
                @endif
                action-delete="{{$actionDelete or null}}"
            ></parcel>
        </div>
    </div>

@endsection