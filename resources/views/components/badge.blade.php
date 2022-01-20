@if(!isset($show) || $show)
    <span class="badge bg-{{ $type ?? 'success' }}">
        {{ $message }}
    </span>
@endif