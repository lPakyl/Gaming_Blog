<x-layout header="Gaming Blog">

    @if(session('gameCreated'))
        <div class="alert alert-success">
            {{ session('gameCreated') }}
        </div>
    @endif
      
    @if(session('userDeleted'))
      <div class="alert alert-warning">
          {{ session('userDeleted') }}
      </div>
    @endif  


</x-layout>