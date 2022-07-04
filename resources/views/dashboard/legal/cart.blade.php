@include('components.header.header')

<div class="container">
    <div class="row">
        <h2>Cart page</h2>
        <hr>
        <br><br>

        <div class="container">
            <div class="row">
                <h2>{{ $data->count() }} articles in shopping cart</h2>

                {{-- -------------------------------------------------------------------------------------------------- --}}
                <form action="{{ route('legal.create') }}" method="POST">
                    @csrf
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Redni broj </th>
                                <th>Article name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>
                                        <input type="text" name="cart_id[]" value="{!! $item->id !!}" hidden="">
                                        {{ $item->id }}
                                    </td>
                                    <td>
                                        <input type="text" name="article_id[]" value="{!! $item->article->id !!}"
                                            hidden="">
                                        <input type="text" name="article_name[]" value="{!! $item->article->name !!}"
                                            hidden="">
                                        {{ $item->article->name }}
                                    </td>
                                    <td>
                                        <input type="text" name="price[]" value="{!! $item->price !!}" hidden="">
                                        {{ $item->price }}
                                    </td>
                                    <td>
                                        <input type="text" name="prod_qty[]" value="{!! $item->prod_qty !!}" hidden>
                                        {{ $item->prod_qty }}
                                    </td>
                                    <td>
                                        <a type="submit" href="{{ 'delete/' . $item['id'] }}"
                                            class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                            Delete
                                        </a>
                                    </td>
                                    <td>
                                        <a type="submit" href="{{ 'edit-cart/' . $item['id'] }}"
                                            class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                            Update
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <p>Comment:</p>
                            <input type="text" name="comments">
                        </tbody>
                    </table>

                    {{-- -------------------------------------------------------------------------------------------------- --}}
                    <p><strong>Ukupno jela u korpi:</strong> {{ $sum_art }}</p>
                    <input type="hidden" name="total_price" value="{{ $sum_prices }}">
                    <p><strong>Ukupna cena:</strong> {{ $sum_prices }}</p>

                    @if ($sum_art > 100)
                        <div class="alert alert-danger" role="alert">
                            Nije moguce poruciti vise od 100 jela u istom trenutku!
                        </div>
                    @elseif ($sum_art == 0)
                        <div class="alert alert-danger" role="alert">
                            Korpa je prazna!
                        </div>
                    @else
                        <button type="submit" class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                            Proceed to Checkout Shopping
                        </button>
                    @endif

                    <a type="button" href="{{ url('/legal/shop') }}"
                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                        Continue Shopping
                    </a>


                </form>
            </div>
        </div>


    </div>
</div>
@include('components.footer.footer')
