@extends("layouts.projects")

@section("title", "Aggiungi un Progetto")

@section("content")


    <form class="form-control my-5" action="{{ route("projects.store") }}" method="POST">
        @csrf {{--è un token che controlla che la richiesta sia valida e che sia stata inviata dal mio browser per protezione da attacchi (cross-site request forgery) --}}

        <div class="mb-3">
            <label class="form-label" for="name">Nome Progetto</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <div class="mb-3">
            <label class="form-label" for="client">Cliente</label>
            <input class="form-control" type="text" name="client" id="client">
        </div>
        <div class="mb-3">
            <label class="form-label" for="year">Anno</label>
            <input class="form-control" type="number" name="year" id="year" value="{{ now()->year }}" min="2010" max="{{ now()->year }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Descrizione</label>
            <textarea class="form-control" rows="5" name="description" id="description"></textarea>
        </div>
        <input  class="btn btn-primary" type="submit" value="Salva">
    </form>


@endsection
