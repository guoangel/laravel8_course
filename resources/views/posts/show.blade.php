@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8">
        @if($post->image)
        <div style="background-image: url('{{ $post->image->url() }}'); min-height: 500px; color: white; text-align: center; background-attachment: fixed;">
            <h1 style="padding-top: 100px; text-shadow: 1px 2px #000">
        @else
            <h1>
        @endif
            {{ $post->title }}
        @if($post->image)    
            </h1>
        </div>
        @else
            </h1>
        @endif

        <p>{{ $post->content }}</p>
        <x-updated slot="" :name="$post->user->name" :date="$post->created_at" :userId="$post->user->id"/>
        <x-updated slot="Updated" :name="$post->user->name" :date="$post->updated_at" :userId="$post->user->id"/>

        <p>Currently read by {{ $counter }} people</p>

        <h4>Comments</h4>
        <x-comment-form :id="$post->id" :name="route('posts.comments.store', ['post' => $post->id])"/>
        <x-comment-list :comments="$post->comments"/>
    </div>
    <div class="col-4">
        @include('posts._activity')
    </div>
@endsection('content')
