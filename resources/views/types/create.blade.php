@extends("layouts.projects")

@section("title", "Aggiungi una Tipologia")

@section("content")


    <form class="form-control my-5" action="{{ route("types.store") }}" method="POST">
        @csrf {{--è un token che controlla che la richiesta sia valida e che sia stata inviata dal mio browser per protezione da attacchi (cross-site request forgery) --}}

        <div class="mb-3">
            <label class="form-label" for="name">Nome Tipologia</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" >
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>



        <div class="mb-3">
            <label class="form-label" for="description">Descrizione</label>
            <textarea class="form-control" rows="5" name="description" id="description">{{ old('description') }}</textarea>
        </div>
        <input  class="btn btn-primary" type="submit" value="Salva">
    </form>


@endsection
