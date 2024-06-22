@extends('admin.layout.app')

@section('content')

   @include('admin.pages.ads.form', ['model' => $ads])

@endsection