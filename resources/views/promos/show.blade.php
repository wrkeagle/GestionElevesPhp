@extends('layout.layout')

@section('content')

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="float-left">
                <h2>Details de la promotion</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="float-right">
                <a class="btn btn-outline-primary" href="{{ route('promos.index') }}">Retour</a>
            </div>
        </div>
    </div>

    <hr>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $promos->nom }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Spécialité:</strong>
                {{ $promos->specialite }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Modules concernés: </strong>
                @foreach($promos->modules as $affmodule)
                        {{ $affmodule->nom }}

                @endforeach
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Éleves membres: </strong><br>
                @foreach($promos->eleves as $affeleve)

                        -<td>{{ $affeleve->nom }}</td>
                        <td>{{ $affeleve->prenom }}</td>
                     <br>

                @endforeach
            </div>
            <a class="btn btn-primary" href="{{ route("eleves.create", ["promo"=>$promos]) }}">Ajout élève à la promo</a>
        </div>

    </div>

@endsection
