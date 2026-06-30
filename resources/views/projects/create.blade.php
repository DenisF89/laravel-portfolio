@extends("layouts.projects")

@section("title", "Aggiungi un Progetto")

@section("content")


    <form class="form-control my-5" action="{{ route("projects.store") }}" method="POST">
        @csrf {{--è un token che controlla che la richiesta sia valida e che sia stata inviata dal mio browser per protezione da attacchi (cross-site request forgery) --}}

        <div class="mb-3">
            <label class="form-label" for="name">Nome Progetto</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="client">Cliente</label>
            <input class="form-control @error('client') is-invalid @enderror" type="text" name="client" id="client" value="{{ old('client') }}">
            @error('client')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="year">Anno</label>
            <input class="form-control @error('year') is-invalid @enderror" type="number" name="year" id="year" value="{{ old('year') }}" min="2010" max="{{ now()->year }}">
            @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="type_id">Tipo di progetto</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option value="" disabled selected>Seleziona un tipo di progetto</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" rows="5" name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input  class="btn btn-primary" type="submit" value="Salva">
    </form>


@endsection
