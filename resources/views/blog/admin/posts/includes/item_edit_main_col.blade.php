<div class="container">
    <div class="col-md-12">
        <div class="card p-5">
            <input type="hidden" name="is_published" value="1">
            <div class="form-row">
                <div class="input-group col-md-12 mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Статус публикации</div>
                    </div>
                    <input type="text" disabled name="is_published" value="@if($item->is_published) Опубликовано @else Не опубликовано @endif" class="form-control" id="Name" placeholder="Введите заголовок" required>
                    <div class="valid-tooltip">
                        great!
                    </div>
                    <div class="invalid-tooltip">
                        Please enter name
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="input-group col-md-12 mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Заголовок</div>
                    </div>
                    <input type="text" name="title" value="{{ $item->title }}" class="form-control" id="Name" placeholder="Введите заголовок" required>
                    <div class="valid-tooltip">
                        great!
                    </div>
                    <div class="invalid-tooltip">
                        Please enter name
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="input-group col-md-12 mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Категория</div>
                    </div>
                    <select name="category_id" class="custom-select" required>
                        <option value="">- Выберите категорию -</option>
                        @foreach($categoryList as $categoryOption)
                            <option value="{{$categoryOption->id}}" @if($categoryOption->id == $item->category_id) selected @endif>{{ $categoryOption->id_title }}</option>
                        @endforeach
                    </select>
                    <div class="valid-tooltip">
                        great!
                    </div>
                    <div class="invalid-tooltip">
                        Please select gender
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="input-group col-md-12 mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Идентификатор</div>
                    </div>
                    <input type="text" value="{{ $item->slug }}" name="slug" class="form-control" placeholder="Введите идентификатор" >
                    <div class="valid-tooltip">
                        great!
                    </div>
                    <div class="invalid-tooltip">
                        Please enter name
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="input-group col-md-12 mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Выдержка</div>
                    </div>
                    <input type="text" value="{{ old('excerpt',$item->excerpt) }}" name="excerpt" class="form-control" placeholder="Введите выдержку" >
                    <div class="valid-tooltip">
                        great!
                    </div>
                    <div class="invalid-tooltip">
                        Please enter name
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="input-group col-md-12 mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Статья</div>
                    </div>
                    <input name="content_raw" value="{{ old('content_raw',$item->content_raw) }}" type="text" class="form-control" placeholder="Введите статью">
                    <div class="valid-tooltip">
                        great!
                    </div>
                    <div class="invalid-tooltip">
                        Please enter name
                    </div>
                </div>
            </div>
            @if($item->exists)
                <div class="form-row">
                    <div class="input-group col-md-12 mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Создано</div>
                        </div>
                        <input type="text" value="{{ $item->created_at }}" name="created_at" class="form-control" placeholder="" disabled required>
                        <div class="valid-tooltip">
                            great!
                        </div>
                        <div class="invalid-tooltip">
                            Please enter name
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group col-md-12 mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Изменено</div>
                        </div>
                        <input type="text" value="{{ $item->updated_at }}" name="updated_at" class="form-control" placeholder="" disabled required>
                        <div class="valid-tooltip">
                            great!
                        </div>
                        <div class="invalid-tooltip">
                            Please enter name
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group col-md-12 mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Удалено</div>
                        </div>
                        <input type="text" value="{{ $item->deleted_at }}" name="deleted_at" class="form-control" placeholder="" disabled required>
                        <div class="valid-tooltip">
                            great!
                        </div>
                        <div class="invalid-tooltip">
                            Please enter name
                        </div>
                    </div>
                </div>
            @endif
            <input type="submit" class="btn btn-primary mb-2" value="сохранить">
        </div>
    </div>
</div>

