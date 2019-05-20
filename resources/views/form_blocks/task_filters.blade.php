<div class="">
    <form action="{{route('task.index')}}" class="form">
        <div class="row">
            <div class="col-md-2">
                <label for="" class="control-label">Завершенность</label>
                <select name="finished" id="" class="form-control">
                    <option value="">Выбрать</option>
                    <option value="1">Завершенные</option>
                    <option value="0">Незавершенные</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="" class="control-label">По дедлайну</label>
                <select name="overdue" id="" class="form-control">
                    <option value="">Выбрать</option>
                    <option value="1">Просроченные</option>
                    <option value="0">Актуальные</option>
                </select>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">По типу</label>
                    <select name="type" id="" class="form-control">
                        <option value="">Выбрать</option>
                        <option value="estimate">Оценка</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">По ключевым словам</label>
                    <input type="text" name="word" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <a href="?" class="btn btn-default">Очистить фильтры</a>
                    <button type="submit" class="btn btn-primary">Фильтровать</button>
                </div>
            </div>
        </div>
    </form>
</div>