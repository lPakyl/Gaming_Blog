<x-layout header="Tutte le console inserite">

    @if(session('consoleCreated'))
        <div class="alert alert-success">
            {{ session('consoleCreated')}}
        </div>
    @endif

    @if(session('consoleUpdated'))
        <div class="alert alert-success">
            {{ session('consoleUpdated')}}
        </div>
    @endif

    @if(session('consoleDeleted'))
        <div class="alert alert-success">
            {{ session('consoleDeleted')}}
        </div>
    @endif


    <div class="conteiner my-3">
        <div class="row justify-content-center">
            
            @if(count($consoles))
            @foreach($consoles as $console)
                <div class="col-12 col-md-2">
                    <div class="card">
                        <img src="{{ Storage::url($console->logo) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $console->name }}</h5>
                            <p class="small fst-italic text-muted">{{ $console->brand }}</p>

                            <hr>
                            <p class="small">Creato da: {{ $console->user_id ? $console->user->name : 'Utente Guest' }}</p>
                            <hr>
                                                        
                            <div class="md-5 d-flex justify-content-between">
                                <a href="{{ route('console.show', compact('console')) }}" class="btn btn-primary">Scopri di piu'</a >

                                @if($console->user_id && $console->user->id == Auth::user()->id)    
                                 <a href="{{ route('console.edit', compact('console')) }}" class="btn btn-warning">Modifica console</a >
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
        @else
            <div class="col-12 text-center">
              <h2>Non sono state inserite console.</h2>
            </div>    
        @endif
        </div>    
    </div>

</x-layout>