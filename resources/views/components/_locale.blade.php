<form action="{{route('setLocale', $lang)}}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn px-0 mb-1 mb-md-0 p-md-1">
        <img src="{{ asset('vendor/blade-flags/country-'.$lang.'.svg')}}" width="32" lenght="32">
    </button>
</form>