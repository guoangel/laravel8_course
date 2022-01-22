@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <img src="{{ $user->image ? $user->image->url() : '' }}"
                class="img-thumbnail avatar" />
        </div>
        <div class="col-8">
            <h3>{{ $user->name }}</h3>
            <p>Currently viewed by {{ $counter }} other users</p>
            <x-comment-form :id="$user->id" :name="route('users.comments.store', ['user' => $user->id])"/>
            <x-comment-list :comments="$user->commentsOn"/>
        </div>
    </div>
@endsection