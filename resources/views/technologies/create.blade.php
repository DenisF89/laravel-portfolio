@extends("layouts.projects")

@section("title", "Aggiungi una Tecnologia")

@section("content")


    <form class="form-control my-5" action="{{ route("technologies.store") }}" method="POST">
        @csrf {{--è un token che controlla che la richiesta sia valida e che sia stata inviata dal mio browser per protezione da attacchi (cross-site request forgery) --}}

        <div class="mb-3">
            <label class="form-label" for="name">Nome Tecnologia</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" >
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="color">Color</label>
            <div class="input-group d-flex" style="max-width:200px;">
                <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror" name="color" id="color" value="{{ old('color', '#000000') }}">
                @error('color')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control" id="colorHex" value="{{ old('color', '#000000') }}" readonly>
            </div>
            <script>
                const color = document.getElementById('color');
                const colorHex = document.getElementById('colorHex');

                color.addEventListener('input', function () {
                    colorHex.value = color.value;
                });
            </script>

        </div>
        <input  class="btn btn-primary" type="submit" value="Salva">



    </form>


@endsection
