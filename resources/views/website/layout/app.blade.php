<!DOCTYPE html>
<html lang="US">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      {{getSiteSetting('site_title') != null? getSiteSetting('site_title'): 'News'}} | {{ isset($pageContent->meta_link)?$pageContent->meta_link:""}}
    </title>
    <meta name="description" content="`{{isset($pageContent->meta_description)?$pageContent->meta_description:getSiteSetting('meta_description')}}`">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('website.layout.style')
    @stack('styles')
</head>
<body>
    @include('website.layout.header')
    @if(isset($slug) && $slug !== 'login')
       @include('website.layout.breaking-news')
    @endif


    @yield('content')
     @if(isset($slug) && $slug !== 'login')
        @include('website.layout.footer')
    @endif
    @include('website.layout.script')

    @stack('scripts')
</body>
</html>
