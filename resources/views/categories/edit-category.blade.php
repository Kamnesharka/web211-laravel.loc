
@extends('app')

@section('title', $category->name . '(ред.)')
@section('content')
<div class="d-flex justify-content-between align-items-center my-5">
    <h2>{{$category->name . '(ред.)'}}</h2>
</div>

<div>
    <form action="{{route('categories.update', $category->id)}}" method="POST">
        @csrf @method("PUT")
        <div class="form-group mb-3">
            <label for="name" class="form-label">Название категории</label>
            <input type="text" id="name" value="{{$category->name}}" name="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
