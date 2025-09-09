@extends('layouts.app')
@section('title', 'Estadistics pilots')
@section('content')
<div class="container">
    <h1>Estadistics pilots</h1>
    <h3>Pilots by city:</h3>
    <ul>
        @foreach($statistics['city_stats'] as $city => $count)
            <li>{{ $city }}: {{ $count }}</li>
        @endforeach
    </ul>
    <h3>Average nitro level:</h3>
    <p>{{ $statistics['average_nitro'] }}</p>
</div>
@endsection
