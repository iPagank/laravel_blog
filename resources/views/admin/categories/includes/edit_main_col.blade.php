<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item active">
                            <a data-toogle="tab" href="#maindata" role="tab">
                                Основные данные
                            </a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                            <input name="title" value="{{ $item->title }}"
                            id = "title"
                            type = "text"
                            class = "form-control"
                            minlength = "3"
                            required>
                            </div>

                            <div class="form-group">
                                <label for="slug">Идентификатор</label>
                            <input name="slug" value="{{ $item->slug }}"
                            id = "slug"
                            type = "text"
                            class = "form-control">
                            </div>

                            <div class="form-group">
                                <label for="slug">Родитель</label>
                            <select name="parent_id" value="{{ $item->slug }}"
                            id = "parent_id"
                            placeholder = "Выберите категорию"
                            required>
                        @foreach ($categorylist as $categoryOption)
                            <option value="{{ $categoryOption->id }}"
                            @if ($item->parent_id == $categoryOption->id)
                                selected
                            @endif
                            @if ($item->id == $categoryOption->id)
                                disabled
                            @endif>
                            {{ $categoryOption->id_title }}
                            </option>
                        @endforeach
                        </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description" id="description" class="form-control" rows="3">@if (!session('success')){{ old('description',$item->description) }}@endif</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
