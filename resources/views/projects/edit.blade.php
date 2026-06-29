@extends("layouts.projects")

@section("title", "Modifica il Progetto")

@section("content")


    <form class="form-control my-5" action="{{ route("projects.update", $project) }}" method="POST">
        @csrf {{--è un token che controlla che la richiesta sia valida e che sia stata inviata dal mio browser per protezione da attacchi (cross-site request forgery) --}}

        @method("PUT") {{--perché il metodo PUT non è supportato dai form HTML, quindi lo simulo con un input nascosto--}}

        <div class="mb-3">
            <label class="form-label" for="name">Nome Progetto</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $project->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="client">Cliente</label>
            <input class="form-control" type="text" name="client" id="client" value="{{ $project->client }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="year">Anno</label>
            <input class="form-control" type="number" name="year" id="year" value="{{ $project->year }}" min="2010" max="{{ now()->year }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="type_id">Tipo di progetto</label>
            <select class="form-select" name="type_id" id="type_id">
                <option value="" disabled>Seleziona un tipo di progetto</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Descrizione</label>
            <textarea class="form-control" rows="5" name="description" id="description">{{ $project->description }}</textarea>
        </div>
        <input  class="btn btn-primary" type="submit" value="Salva">
    </form>


@endsection
