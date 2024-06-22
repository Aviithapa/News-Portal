@extends('admin.layout.app')

@section('content')

   @include('admin.pages.ads.form', ['categories' => $category])

@endsection