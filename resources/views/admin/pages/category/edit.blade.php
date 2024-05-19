@extends('admin.layout.app')

@section('content')

   @include('admin.pages.category.form', ['model' => $news, 'categories' => $category])

@endsection