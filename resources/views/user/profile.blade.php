<x-layout header="Profilo utente">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">I tuoi dati</h5>
                    <p class="card-text">Nome utente: {{ Auth::user()->name }}</p>
                    <p class="card-text">Email utente: {{ Auth::user()->email }}</p>
                    <p class="card-text">Iscritto il: {{ Auth::user()->created_at }}</p>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#userDestroy">
                        Disiscriviti dal sito
                    </button>

                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">

            @foreach (Auth::user()->consoles->sortByDesc('created_at') as $console)
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="{{ Storage::url($console->logo) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $console->name }}</h5>
                            <p class="small fst-italic text-muted">{{ $console->brand }}</p>

                            <hr>
                            <p class="small">Creato da: {{ $console->user_id ? $console->user->name : 'Utente Guest' }}
                            </p>
                            <hr>

                            <div class="mt-5 d-flex justify-content-between">
                                <a href="{{ route('console.show', compact('console')) }}" class="btn btn-primary">Scopri
                                    di piu'</a>

                                @if ($console->user_id && $console->user->id == Auth::user()->id)
                                    <a href="{{ route('console.edit', compact('console')) }}"
                                        class="btn btn-warning">Modifica console</a>
                                    <form method="POST" action="{{ route('console.destroy', compact('console')) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Cancella</button>
                                    </form>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach




        </div>
    </div>

    <div class="modal" tabindex="-1" id="userDestroy">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sei Sicuro di volerti cancellare?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>L'operazione sara' definitiva</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form method="POST" action="{{ route('user.destroy') }}" class="d-inline">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">Disiscriviti dal sito</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>
