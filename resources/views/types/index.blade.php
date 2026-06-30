@extends("layouts.projects")

@section("title","Tipologie di progetti");

@section("content")

    <a href="{{ route("types.create") }}" class="btn btn-outline-primary mt-3">Aggiungi una tipologia</a>

    <table class="table w-75 my-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type )
            <tr>
                <td>{{ ucfirst($type->name) }}</td>
                <td>{{$type->description}}</td>
                <td><a href={{ route("types.edit",$type)}} class="btn btn-outline-warning">Modifica</a></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $type->id }}">
                        Elimina
                    </button>
                    <x-modal :data="$type" prefix="types"/>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
