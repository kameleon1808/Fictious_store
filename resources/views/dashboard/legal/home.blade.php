@include('components.header.header')
@include('components.navbarl')

<div class="container">
    <div class="row">

        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Studio!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        </header>
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">E-Commerce</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima
                            maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Responsive Design</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima
                            maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Web Security</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima
                            maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="col-md-6 offset-md-3" style="margin-top: 45px">
            <h4>Legal user Dashboard</h4>
            <hr>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">{{ auth()->guard('legal')->user()->name }}</td>
                        <td>{{ auth()->guard('legal')->user()->email }}</td>
                        <td>
                            <form action="{{ route('legal.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                    Logout
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('legal.delete') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                    Delete account
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ url('legal/edit-pwd') }}"
                                class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                Update passsword
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ url('/legal/shop') }}" type="button"
                class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">Shop</a>

            <a href="{{ url('/legal/cart') }}" type="button"
                class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">Cart</a>

        </div>
    </div>



    <br><br>

    @include('components.articlesl')

    @include('components.about')

    @include('components.team')

    @include('components.contact')


    @include('components.footer.footer')

</div>
