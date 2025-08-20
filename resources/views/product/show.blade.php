@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])


@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title" @if($viewData["product"]["price"] > 100) style="color: red" @endif>
          {{ $viewData["product"]["name"] }}
        </h5>
        <p class="card-text">Price: ${{ $viewData["product"]["price"] }}</p>
        {{-- Agrega aquí la sección de comentarios --}}
        <h5>Comentarios</h5>
        <ul>
            @foreach($viewData["comments"] as $comment)
                <li>{{ $comment->description }}</li>
            @endforeach
        </ul>

        <form method="POST" action="{{ route('product.saveComment', ['id' => $viewData['product']['id']]) }}">
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label">Nuevo comentario</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar comentario</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
