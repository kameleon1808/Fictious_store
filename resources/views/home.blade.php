@include('components.header.header')

<div class="container">
    <div class="row">
        {{-- <h1>Pocetna home strna </h1> --}}

        @auth
            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                    Logout
                </button>
            </form>
        @else
            <a type="button" href="{{ url('user/login') }}" class="btn btn-outline-primary">Log in as natural
                person</a>
            <a type="button" href="{{ url('legal/login') }}" class="btn btn-outline-primary">Log in as legal
                person</a>

            <a type="button" href="{{ url('user/register') }}" class="btn btn-outline-primary">Register as
                natural person</a>
            <a type="button" href="{{ url('legal/register') }}" class="btn btn-outline-primary">Register as legal
                person</a>
        @endauth
        {{-- </div>
</div> --}}
        @include('components.footer.footer')
