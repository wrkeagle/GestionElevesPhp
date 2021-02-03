@extends('layout.layout')

@section('content')

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="float-left">
                <h2>Editer un module</h2>
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

    <form action="{{ route('modules.update', $promo_edit) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="nom" placeholder="Nom" value="{{ $promo_edit->nom }}">
        </div>
        <div class="form-group">
            <label for="name">Description:</label>
            <input type="text" class="form-control" id="address" name="description" placeholder="Description" value="{{ $promo_edit->description }}">
        </div>
            Promotion(s) Concernée(s):
        <div>
            @foreach($promos as $promo)
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="promo-{{ $promo->id }}"
                           value="{{ $promo->id }}" name="promos[]"
                           @foreach($promo_edit->promos as $mod_p)
                           @if($mod_p->id == $promo->id) checked @endif
                        @endforeach
                    >
                    <label class="form-check-label" for="promo-{{ $promo->id }}">{{ $promo->nom }}</label>
                </div>
            @endforeach

        </div>


        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
@endsection
