@extends("layouts.projects")

@section("title")
    Modifica Tipologia {{ $type->name }}
@endsection

@section("content")


    <form class="form-control my-5" action="{{ route("types.update",$type) }}" method="POST">
        @csrf {{--è un token che controlla che la richiesta sia valida e che sia stata inviata dal mio browser per protezione da attacchi (cross-site request forgery) --}}
        @method("PUT")

        <div class="mb-3">
            <label class="form-label" for="name">Nome Tipologia</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $type->name) }}" > {{-- se esiste in sessione un old per controllo validazione inserisci quello, altrimenti recupera il valore registrato nel database --}}
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>



        <div class="mb-3">
            <label class="form-label" for="description">Descrizione</label>
            <textarea class="form-control" rows="5" name="description" id="description">{{ old('description', $type->description) }}</textarea>
        </div>
        <input  class="btn btn-primary" type="submit" value="Salva">
    </form>


@endsection
