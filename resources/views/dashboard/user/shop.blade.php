@include('components.header.header')

<div class="container">
    <div class="row">

        @include('components.articles')

        <a href="{{ url('/user/home') }}">Back</a>
    </div>
</div>
@include('components.footer.footer')
