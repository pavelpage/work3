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
            <form action="{{$actionSave}}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                {!! csrf_field() !!}
                @if(!empty($_method))
                    <input type="hidden" name="_method" value="{{$_method}}">
                @endif

                <fieldset>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Название</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="title" value="{{ $parcel->title or '' }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Пункт отправления</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="from" value="{{ $parcel->from or '' }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Пункт назначения</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="to" value="{{ $parcel->to or '' }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Внутренняя доставка(км)</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="km_domestic" value="{{ $parcel->km_domestic or 0 }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Международная доставка(км)</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="km_international" value="{{ $parcel->km_international or 0 }}" required>
                        </div>
                    </div>

                </fieldset>

                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection