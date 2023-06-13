<x-layout header="{{ $console->name }}">

   

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12-col-md-8">
            <img src="{{ Storage::url($console->logo) }}" alt="Logo di {{ $console->name }}" class="img-fluid">
            <p>{{ $console->brand }}</p>
            <p>{{ $console->description }} </p>

            @if(count($console->games))
                <hr>
                <h3>Giochi disponibili</h3>
                <ul>
                    @foreach($console->games as $game)
                        <li>{{ $game->title }}, prodotto da {{ $game->producer }}</li>
                    @endforeach
                </ul>
            @endif

            <hr>
            <p>Creato il: {{ $console->created_at }}</p>
            <hr>
            <a href="{{ route('console.index') }}" class="btn btn-primary">Torna indietro</a>
        </div>
    </div>
</div>
</x-layout>