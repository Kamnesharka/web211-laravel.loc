@extends('app')

@section('title', 'Новая категория')
@section('content')
<div class="d-flex justify-content-between align-items-center my-5">
    <h2>Новая категория</h2>
</div>

<div>
    <form action="{{route("categories.store")}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Название категории</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection
