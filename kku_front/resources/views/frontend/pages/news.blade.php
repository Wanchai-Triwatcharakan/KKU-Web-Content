@extends('frontend.layouts.layout-main')
@section('title', 'About Us')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')
    <div class="about">
      News Page
      <div class="flex flex-col">
        @foreach ($news as $new)
        <p>{{$new->title}}</p>
        @endforeach
      </div>
    </div>
@endsection
@section('script')
@endsection
