@include('components.header.header')

<div class="container">
    <div class="row ">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <section class="page-section bg-light " id="portfolio">
                <div class="container">
                    <div class="text-center">
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="portfolio-item">
                                <a href="/user/shop/{{ $article->slug }}">
                                    <img class="img-fluid" src="{{ asset($article->img) }}" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <input type="hidden" value="{{ $article->id }}" name="article_id">
                                    <div class="portfolio-caption-heading">{{ $article->name }}</div>
                                    <p>{{ $article->details }}</p>
                                    <input type="hidden" name="price" value="{{ $article->price }}">
                                    <div class="portfolio-caption-subheading text-muted">{{ $article->price }} RSD
                                    </div>
                                    <input type="number" name="prod_qty" value="1"><br><br>
                                    <button type="submit" class="btn btn-primary">Add to cart</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>

        <a href="{{ url('/user/shop') }}">Back</a>
    </div>
</div>

@include('components.footer.footer')
