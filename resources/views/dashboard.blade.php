@extends('layouts.cui')

@section('content')
    <div class="card mb-4">
        <div class="card-header"> Dashboard</div>
        <div class="card-body">
            Welcome to dashboard, {{ auth()->user()->name }}!
        </div>
    </div>
@endsection
