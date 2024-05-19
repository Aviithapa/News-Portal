@extends('admin.layout.app')

@section('content')

   @include('admin.pages.news.form', ['model' => $news, 'categories' => $category])

@endsection