@extends('admin.layout.app')

@section('content')

   @include('admin.pages.cms.post.form', ['model' => $post])

@endsection