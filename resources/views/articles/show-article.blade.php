@extends('app')

@section('title', 'Новости')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-5">
        <h2>Новости</h2>
        <a href="{{route('articles.create')}}" class="btn btn-primary">Добавить</a>
    </div>

    <div>
        <h1 class="my-5">{{$article->title}}</h1>
        <p>{{$article->content}}</p>
        <p>Категория:  {{$article->category->name}}</p>
    </div>
@endsection
