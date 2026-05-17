<x-layout title="Registrati">

    <x-display-errors/>

    

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6 ">
                <form class="rounded-4 background-custom-op text-light p-4 shadow" method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Completo</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    </div>
                    <button type="submit" class="btn background-custom-highlight">Registrati</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
