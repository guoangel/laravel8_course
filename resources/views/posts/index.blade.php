@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="row">
    <div class="col-8">
    @forelse ($posts as $post)
        <p>
            <h3>
                @if($post->trashed())
                    <del>
                @endif
                <a class="{{ $post->trashed() ? 'text-muted' : '' }}"
                    href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
                @if($post->trashed())
                    </del>
                @endif
            </h3>

            <x-updated slot="" :name="$post->user->name" :date="$post->created_at"/>

            @if($post->comments_count)
                <p>{{ $post->comments_count }} comments</p>
            @else
                <p>No comments yet!</p>
            @endif

            @auth
                @can('update', $post)
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                        class="btn btn-primary">
                        Edit
                    </a>
                @endcan
            @endauth

            {{-- @cannot('delete', $post)
                <p>You can't delete this post</p>
            @endcannot --}}

            @auth
                @if(!$post->trashed())
                    @can('delete', $post)
                        <form method="POST" class="fm-inline"
                            action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Delete!" class="btn btn-primary"/>
                        </form>
                    @endcan
                @endif
            @endauth
        </p>
    @empty
        <p>No blog posts yet!</p>
    @endforelse
    </div>
    <div class="col-4">
        <div class="container">
            <div class="row">
                <x-card title="Most Commented" subtitle="What people are currently talking about" :items="$mostCommented"/>
            </div>

            <div class="row mt-4">
                <x-card title="Most Active" subtitle="Users with most posts written" :items="collect($mostActive)->pluck('name')"/>
            </div>

            <div class="row mt-4">
                <x-card title="Most Active Last Month" subtitle="Users with most posts written in the month" :items="collect($mostActiveLastMonth)->pluck('name')"/>
            </div>
        </div>
    </div>
</div>    
@endsection('content')