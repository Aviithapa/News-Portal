@extends('admin.layout.app')

@section('content')

   @include('admin.pages.category.form', ['categories' => $category])

@endsection