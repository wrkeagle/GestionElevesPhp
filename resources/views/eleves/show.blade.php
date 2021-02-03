@extends('layout.layout')

@section('content')

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="float-left">
                <h2>Details de l'élève</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="float-right">
                <a class="btn btn-outline-primary" href="{{ route('eleves.index') }}">Retour</a>
            </div>
        </div>
    </div>

    <hr>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $eleves->nom }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Prénom:</strong>
                {{ $eleves->prenom }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $eleves->email }}
            </div>
        </div>

    </div>

@endsection
