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
        <a href="{{url('news/'.$new->id)}}">
          <p>{{$new->title}}</p>
        </a>
        @endforeach
      </div>
    </div>
@endsection
@section('script')
@endsection
