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
                <ul class="breadcrumb">
                    <li class="active">
                        Список посылок
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{route('parcel.create')}}">Создать</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('form_blocks.errors')
                @include('form_blocks.session_info')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Пункт назначения</th>
                            <th>Пункт отправления</th>
                            <th>Стоимость доставки</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->from}}</td>
                                <td>{{$item->to}}</td>
                                <td>{{$item->price}}</td>
                                <td><a href="{{route('parcel.edit', $item->id)}}">Редактировать</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection