@extends('admin.layout.app')

@section('content')

   @include('admin.pages.cms.facility.form', ['model' => $facility])

@endsection