<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Products</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-lg-4 col-sm-6">
                    <div class="portfolio-item">
                        <a href="/legal/shop/{{ $article->slug }}">
                            <img class="img-fluid" src="{{ asset($article->img) }}" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{ $article->name }}</div>
                            <div class="portfolio-caption-subheading text-muted">{{ $article->price }} RSD</div>

                            <a type="button" href="/legal/shop/{{ $article->slug }}" class="btn btn-primary">Add
                                to
                                cart</a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
