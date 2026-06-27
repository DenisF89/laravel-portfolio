@extends("layouts.projects")

@section("title", "Tutti i progetti")

@section("content")

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cliente</th>
            <th>Anno</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project )
        <tr>
            <td>{{ ucfirst($project->name) }}</td>
            <td>{{$project->client}}</td>
            <td>{{$project->year}}</td>
            <td><a href={{ route("projects.show",$project)}}>Visualizza</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
