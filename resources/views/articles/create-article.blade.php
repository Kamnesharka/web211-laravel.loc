@extends('app')

@section('title', 'Новая статья')
@section('content')
<div class="d-flex justify-content-between align-items-center my-5">
    <h2>Новая статья</h2>
</div>



<div>
    <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data" class="form-select">
        @csrf
        <div class="form-group mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
            @error('title')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="text" class="form-label">Текст</label>
            <textarea name="text" id="text" class="form-control" >{{old('text')}}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="category" class="form-label">Категория</label>
            <select name="category" id="category">
                <option value="" selected disabled>Выберите категорию</option>

                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"  @if ($category->id == old("category")) selected @endif>{{$category->name}}
                        </option>

                    @endforeach

            </select>
            @error('category')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="form-chesk mb-3">
            <input type="checkbox" id="is_published" name="is_published" class="form-check-input" value="1" @if (old('is_published') == 1) checked @endif>
            <label for="is_published" class="form-check-lable">Опубликовать</label>
           
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection
