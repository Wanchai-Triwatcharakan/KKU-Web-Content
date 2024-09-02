@extends('frontend.layouts.layout-main')
@section('title', 'About Us')
@section('style')
@endsection
@section('content')
    <div class="about">
      News Detial
      <div class="flex flex-col">
        {{$news->id}} {{$news->title}} 
      </div>
    </div>
@endsection
@section('script')
@endsection
