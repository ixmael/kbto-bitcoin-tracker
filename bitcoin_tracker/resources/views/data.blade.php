id,date,last
@foreach ($bitcoin_tracker as $b)
{{ $b->id }},{{ $b->created_at }},{{ $b->last }}
@endforeach
