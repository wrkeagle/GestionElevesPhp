@extends('layout.layout')

@section('content')

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="float-left">
                <h2>Éditer la promotion</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="float-right">
                <a class="btn btn-outline-primary" href="{{ route('promos.index') }}">Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Il ya un probleme avec ce que vous avez entré.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('promos.update',$promos->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="nom" placeholder="Nom" value="{{ $promos->nom }}">
        </div>

        <div class="form-group">
            <label for="address">Spécialité:</label>
            <textarea class="form-control" id="address" name="specialite" placeholder="Spécialité">{{ $promos->specialite }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
@endsection
