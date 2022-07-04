@include('components.header.header')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form action="{{ url('user/update-cart/' . $data['id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="cart_id" value="{{ $data->id }}">
                    <input type="text" value="{{ $data->article->name }}" class="form-control" readonly
                        name="name_ed">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" value="{{ $data->article->price }}" class="form-control" readonly
                        name="price_ed">
                </div>
                <div class="form-group">
                    <label>Kolicina</label>
                    <input type="text" value="{{ $data->prod_qty }}" class="form-control" name="prod_qty_ed">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Edit</button><br>
                <a href="{{ url('/user/cart') }}">Back</a>
            </form>
        </div>

    </div>
</div>

@include('components.footer.footer')
