<p>
    @php
        //dd($tags);
    @endphp
    @if(is_a($tags, 'Illuminate\Support\Collection'))
        @foreach ($tags as $tag)
            <a href="{{ route('posts.tags.index', ['tag' => $tag->id]) }}" 
            class="badge bg-success badge-lg">{{ $tag->name }}</a>
        @endforeach
    @else
        {{ $tags }}
    @endif
</p>