<x-layout header="Registrati">

    <div class="conteiner my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <form class="p-5 shadow" method="POST" action="{{ route('register') }}">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome utente</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label"> Conferma Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="password_confirmation">
                    </div>



                    <button type="submit" class="btn btn-primary">Registrati</button>
                </form>

            </div>
        </div>
    </div>



</x-layout>
