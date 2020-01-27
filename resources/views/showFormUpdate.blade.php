@extends('master')
@section('title')
Edit
@endsection
@section('content')

<form action="/UpdatePost" method="post">
    @csrf
    <p>Content:</p>
    <input type="text" name="content" value="{{ $tweet->content }}">
    <p>Author:</p>
    <input type="text" name="author" value="{{ $tweet->author }}">
    <button name="id" type="submit" value="{{ $tweet->id }}" >Update Post</button>
</form>



@include('header')

@endsection
