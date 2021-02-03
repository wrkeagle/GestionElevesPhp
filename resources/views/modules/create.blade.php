@extends('layout.layout')

@section('content')

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="float-left">
                <h2>Ajouter un Module</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="float-right">
                <a class="btn btn-outline-primary" href="{{ route('modules.index') }}">Retour</a>
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

    <form action="{{ route('modules.store', ['promo_id' => $actual_promo] )}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="nom" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="name">Description:</label>
            <input type="text" class="form-control" id="address" name="description" placeholder="Description">
        </div>
        @foreach($promos as $promo)
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="promo-{{ $promo->id }}"
                       value="{{ $promo->id }}" name="promos"
                       @if($actual_promo != null && $promo->id == $actual_promo) checked @endif>
                <label class="form-check-label" for="promo-{{ $promo->id }}">{{ $promo->nom}}/{{ $promo->specialite}}</label>
            </div>
        @endforeach


        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>

@endsection
