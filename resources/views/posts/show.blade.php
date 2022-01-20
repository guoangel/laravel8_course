@extends('layouts.app')

@section('title', $post->title)

@section('content')
<h1>
    {{ $post->title }}
    <x-badge type="danger" message="Brand new Post!" :show="now()->diffInMinutes($post->created_at) < 1"/>
</h1>

<p>{{ $post->content }}</p>
<p>Added {{ $post->created_at->diffForHumans() }}</p>
<p>By {{ $post->user->name }}</p>
<p>Currently read by {{ $counter }} people</p>
<h4>Comments</h4>
@include('comments._form')
@forelse($post->comments as $comment)
    <p>
        {{ $comment->content }}
        <p>Added {{ $comment->created_at->diffForHumans() }}</p>
    </p>
    <x-updated slot="" :name="$comment->user->name" :date="$comment->created_at"/>
@empty
    <p>No comments yet!</p>
@endforelse

@endsection