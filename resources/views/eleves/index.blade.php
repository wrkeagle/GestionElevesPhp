@extends('layout.layout')

@section('content')

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="float-left">
                <h2>Liste des éleves</h2>
            </div>
        </div>

        <div class="col-md-4">

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
            <th>Prénom</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($eleves as $eleve)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $eleve->nom }}</td>
                <td>{{ $eleve->prenom }}</td>
                <td>{{ $eleve->email }}</td>

                <td>
                    <form action="{{ route('eleves.destroy',$eleve->id) }}" method="POST">
                        <a class="btn btn-outline-info btn-sm" href="{{ route('eleves.show',$eleve->id) }}">Montrer</a>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('eleves.edit',$eleve->id) }}">Editer</a>
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
