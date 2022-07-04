@include('components.header.header')

<div class="container">
    <div class="row">

        @include('components.articlesl')

        <a href="{{ url('/legal/home') }}">Back</a>
    </div>
</div>

@include('components.footer.footer')
