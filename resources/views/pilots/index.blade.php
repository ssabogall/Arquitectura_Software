@extends('layouts.app')
@section('title', 'List pilots')
@section('content')
<div class="container">
    <h1>List of Pilots</h1>
    {{-- Success message --}}
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    @if($pilots->isEmpty())
        <p>don't have registered pilots.</p>
    @else
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Origin City</th>
                    <th>Nitro Level</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pilots as $pilot)
                    <tr>
                        <td>{{ $pilot->id }}</td>
                        <td>
                            @if($pilot->origin_city === 'Tokio')
                                {{ $pilot->name }} (Reto Tokio)
                            @else
                                <span style="color: blue;">{{ $pilot->name }}</span>
                            @endif
                        </td>
                        <td>{{ $pilot->origin_city }}</td>
                        <td>{{ $pilot->nitro_level }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
