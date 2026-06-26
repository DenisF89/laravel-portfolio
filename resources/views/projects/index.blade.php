@extends("layouts.projects");

@section("title", "Tutti i progetti")

@section("content")

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cliente</th>
            <th>Anno</th>
            <th>Descrizione</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project )
        <tr>
            <td>{{$project->name}}</td>
            <td>{{$project->client}}</td>
            <td>{{$project->year}}</td>
            <td>{{$project->description}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
