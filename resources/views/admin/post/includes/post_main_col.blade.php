<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if ($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">


                <div class="card-title">
                    <ul class="nav nav-tabs"  role="tablist">
                        <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab" aria-controls="maindata" aria-selected="true">Основные</a>
                        </li>

                        <li class="nav-item">
                                <a class="nav-link"  data-toggle="tab" href="#adddata" role="tab" aria-controls="adddata" aria-selected="false">Доп.данные</a>
                        </li>
                    </ul>
                </div>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text"
                                name="title"
                            value="{{$item->title}}"
                            id="title"
                            class="form-control"
                            minlength="3"
                            required>
                            </div>
                            <div class="form-group">
                                <label for="content_raw">Статья</label>
                                <textarea name="content_raw" id="content_raw" class="form-control" rows="20">
                                    {{old('content_raw',$item->content_raw)}}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="adddata" role="tabpanel">
                            <div class="form-group">
                                <label for="category_id">Категория</label>
                                <select name="category_id" id="category_id"
                                        class="form-cntrol" placeholder="Выберите категорию" required>
                                    @foreach ($categoryList as $categotyOptions)
                            <option value="{{$categotyOptions->id}}"
                                        @if ($categotyOptions->id == $item->category_id)
                                            selected
                                        @endif>
                                        {{$categotyOptions->id_title}}
                            </option>
                                    @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="slug">Идентификатор</label>
                            <input name="slug" value="{{$item->slug}}"
                                        id="slug"
                                        type="text"
                                        class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="excerpt">Выдержка</label>
                                <textarea name="excerpt" id="excerpt" class="form-control" rows="3">
                                    {{old('excerpt',$item->excerpt)}}
                                </textarea>
                            </div>

                            <div class="form-check">
                                <input name="is_published" type="hidden" value="0">

                            <input type="checkbox" name="is_published" class="form-check-input" value="1"
                            @if ($item->is_published)
                                checked = "checked"
                            @endif
                            >
                            <label for="is_published" class="form-check-label">Опубликовано</label>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
