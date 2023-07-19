@extends('app')

@section('title', 'Категории')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Категории</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Добавить</a>
    </div>

    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Категория</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Ред.</a>
                            <a href="#" class="btn btn-sm btn-danger">Удалить</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
