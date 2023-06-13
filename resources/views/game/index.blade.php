<x-layout header="Tutti i videogiochi inseriti">

    <div class="container my-5">
        <div class="row justify-content-center">

            @foreach($games as $game)
            <div class="col-12 col-md-4">
              <div class="card">
                <img src="{{ Storage::url($game->cover) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $game->title }}</h5>
                    <p class="small fst-italic text-muted">{{ $game->producer }}</p>
                    <p class="card-text">{{ $game->description }}</p>
                </div>
            </div>
        </div>   
            @endforeach

        </div>
    </div>


</x-layout>