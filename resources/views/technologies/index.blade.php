@extends("layouts.projects")

@section("title","Tecnologie");

@section("content")

    <a href="{{ route("technologies.create") }}" class="btn btn-outline-primary mt-3">Aggiungi una tecnologia</a>

    <table class="table w-75 my-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Colore</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tecs as $tec )
            <tr>
                <td>{{ ucfirst($tec->name) }}</td>
                <td><span class="badge" style="background-color: {{$tec->color}}"</td>{{$tec->color}}</span></td>
                <td><a href={{ route("technologies.edit",$tec)}} class="btn btn-outline-warning">Modifica</a></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $tec->id }}">
                        Elimina
                    </button>
                    <x-modal :data="$tec" prefix="technologies"/>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
