@extends('admin.layout.app')

@section('content')

   @include('admin.pages.news.form', ['categories' => $category])

@endsection