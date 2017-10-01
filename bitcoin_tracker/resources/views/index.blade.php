@extends('layouts.base')

@section('title', 'Inicio')

@section('canvas_block')
<div class="row">
    <!--
    <div class="col-lg-12">
        <button type="button" onClick="data_trigger()">Actualizar</button>
    </div>
    -->
    <div id="graph" class="col-lg-12" data-source="{{ route('data') }}" data-last-item="{{ $last_update_tracker ? $last_update_tracker->id : 0 }}">
        <div class="alert alert-warning {{ $last_update_tracker ? 'hidden' : '' }}">No hay registros en la base de datos.</div>
        <svg width="800" height="400"></svg>
    </div>
</div>
@endsection
