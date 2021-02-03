@extends('layout.layout')

@section('content')

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="float-left">
                <h2>Details du module</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="float-right">
                <a class="btn btn-outline-primary" href="{{ route('modules.index') }}">Retour</a>
            </div>
        </div>
    </div>

    <hr>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $modules->nom }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $modules->description }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
            <strong>Promotions concernées: </strong>
                @foreach($modules->promos as $module)
                {{ $module->nom }},
            @endforeach
            </div>
        </div>




    </div>

@endsection
