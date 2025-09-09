@extends('layouts.app')
@section('title', 'Register pilot')
@section('content')
<div class="container">
    <h1>Register Pilot</h1>
    {{-- Mensajes de validación --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- Formulario --}}
    <form action="{{ route('pilots.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="origin_city">Origin City:</label>
            <select name="origin_city" required>
                <option value="">-- Select --</option>
                <option value="LA" {{ old('origin_city') == 'LA' ? 'selected' : '' }}>LA</option>
                <option value="Tokio" {{ old('origin_city') == 'Tokio' ? 'selected' : '' }}>Tokio</option>
            </select>
        </div>
        <div>
            <label for="nitro_level">Nitro Level:</label>
            <input type="number" name="nitro_level" value="{{ old('nitro_level') }}" min="1" max="100" required>
        </div>
        <button type="submit">Save</button>
    </form>
</div>
@endsection
