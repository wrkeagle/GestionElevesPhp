@extends('layout.layout')

@section('content')

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="float-left">
                <h2>Liste des promotions</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="float-right">
                <a class="btn btn-outline-success" href="{{ route('promos.create') }}"> Créer nouvelle promotion</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Spécialité</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($promos as $promo)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $promo->nom }}</td>
                <td>{{ $promo->specialite }}</td>
                <td>
                    <form action="{{ route('promos.destroy',$promo->id) }}" method="POST">
                        <a class="btn btn-outline-info btn-sm" href="{{ route('promos.show',$promo->id) }}">Montrer</a>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('promos.edit',$promo->id) }}">Éditer</a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
