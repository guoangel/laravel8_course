@forelse($comments as $comment)
    <p>
        {{ $comment->content }}
    </p>
    <x-tags :tags="$comment->tags"/>
@empty
    <p>No comments yet!</p>
@endforelse