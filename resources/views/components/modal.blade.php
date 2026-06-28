<!-- Modal -->

@props(['project'])

    <div class="modal fade" id="staticBackdrop-{{ $project->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-{{ $project->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel-{{ $project->id }}">Conferma eliminazione progetto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Stai per eliminare definitivamente <br><b>{{ $project->name }}</b>. </p>
                <p>Sei sicuro di voler procedere? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route("projects.destroy", $project) }}" method="POST" >
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-danger" type="submit" value="Elimina definitivamente">
                </form>
            </div>
            </div>
        </div>
    </div>
