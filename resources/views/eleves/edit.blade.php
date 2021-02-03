@extends('layout.layout')

@section('content')

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="float-left">
                <h2>Editer un élève</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="float-right">
                <a class="btn btn-outline-primary" href="{{ route('eleves.index') }}">Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Wow!!</strong> Il y a eu un problème avec ce que vous avez entré.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eleves.update',$eleves->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="nom" placeholder="Nom" value="{{ $eleves->nom }}">
        </div>
        <div class="form-group">
            <label for="name">Prénom:</label>
            <input type="text" class="form-control" id="address" name="prénom" placeholder="Prénom" value="{{ $eleves->prenom }}">
        </div>
        <div class="form-group">
            <label for="name">Email:</label>
            <input type="text" class="form-control" id="address" name="email" placeholder="Email" value="{{ $eleves->email }}">
        </div>

        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
@endsection
