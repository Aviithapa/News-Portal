@extends('admin.layout.app')

@section('content')

   @include('admin.pages.cms.banner.form', ['model' => $banner])

@endsection