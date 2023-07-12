@extends('layouts.main')

@section('content')
    <h2>{{ $kitab->nama_kitab }}</h2>
    {{-- @foreach ($murids->where('ting_id', $tingkat->id)->get() as $no => $m) --}}
    @foreach ($bab->where('kitab_id', $kitab->id)->get() as $b)
        <h5>{{ $b->bab }}</h5>
        <h5>{{ $b->kitab->nama_kitab }}</h5>
    @endforeach
@endsection
