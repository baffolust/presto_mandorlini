<x-layout title="Login">

    <x-display-errors/>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6 ">
                <form class="rounded-4 background-custom-op text-light p-4 shadow" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn background-custom-highlight">Login</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
