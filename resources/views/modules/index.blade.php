@extends('layout.layout')

@section('content')

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="float-left">
                <h2>Liste des Modules</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="float-right">
                <a class="btn btn-outline-success" href="{{ route('modules.create') }}"> Ajouter un module</a>
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
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($modules as $module)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $module->nom }}</td>
                <td>{{ $module->description }}</td>

                <td>
                    <form action="{{ route('modules.destroy',$module->id) }}" method="POST">
                        <a class="btn btn-outline-info btn-sm" href="{{ route('modules.show',$module->id) }}">Montrer</a>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('modules.edit',$module->id) }}">Editer</a>
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
