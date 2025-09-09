@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('content')
<div class="text-center">
  Welcome to the application
  <h1>Welcome to the pilot management system</h1>
    <p>Select an option from the menu:</p>
    <ul>
        <li><a href="{{ route('pilots.create') }}">Register pilots</a></li>
        <li><a href="{{ route('pilots.index') }}">List pilots</a></li>
        <li><a href="{{ route('pilots.statistics') }}">Pilot statistics</a></li>
    </ul>
</div>
@endsection
