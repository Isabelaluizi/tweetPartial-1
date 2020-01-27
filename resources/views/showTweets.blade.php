@extends('master')
@section('title')
Tweets
@endsection
@section('content')

@include('header')

@foreach ($allTweets as $tweet)
    <p>{{ $tweet->content }}</p>
    <p><strong>{{ $tweet->author }}</strong></p>
    <form action="/deletePost" method="post">
        @csrf
        <button name="id" type="submit" value="{{ $tweet->id }}" >Delete Post</button>
    </form>
    <form action="/" method="post">
        @csrf
        <button name="id" type="submit" value="{{ $tweet->id }}" >Edit Post</button>
    </form>
@endforeach



<form action="/" method="post">
    @csrf
    <input type="text" name="author" value='author'>
    <input type="text" name="content" value='tweet'>
    <input type="submit" value="Create Tweet">
</form>

@include('footer')
@endsection
