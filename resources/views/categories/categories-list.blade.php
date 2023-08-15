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
                        <td class="d-flex">
                            <a href="{{route ('categories.edit', $category->id)}}" class="btn btn-sm btn-warning">Ред.</a>
                            <form action="{{route ('categories.delete', $category->id)}}" method="POST" class="mx-3">
                                @csrf @method("DELETE")
                                <button class="btn btn-sm btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
