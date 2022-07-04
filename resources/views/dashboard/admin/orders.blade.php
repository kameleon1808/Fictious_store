<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.orders') }}" method="POST">
                @csrf
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Id </th>
                            <th>User Id </th>
                            <th>Legal Id </th>
                            <th>Order date </th>
                            <th>Payment method </th>
                            <th>Shipping address </th>
                            <th>Shipping from </th>

                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Phone</th>
                            <th>Comments</th>
                            <th>Cart Id</th>
                            <th>Article name</th>
                            <th>Product quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $item)
                            <tr>
                                <td>
                                    <input type="text" name="id[]" value="{!! $item->id !!}" hidden="">
                                    {{ $item->id }}
                                </td>
                                <td>
                                    <input type="text" name="user_id[]" value="{!! $item->user_id !!}" hidden="">
                                    {{ $item->user_id }}
                                </td>
                                <td>
                                    <input type="text" name="legal_id[]" value="{!! $item->legal_id !!}" hidden="">
                                    {{ $item->legal_id }}
                                </td>
                                <td>
                                    <input type="text" name="order_date[]" value="{!! $item->order_date !!}" hidden="">
                                    {{ $item->order_date }}
                                </td>
                                <td>
                                    <input type="text" name="payment_method[]" value="{!! $item->payment_method !!}"
                                        hidden="">
                                    {{ $item->payment_method }}
                                </td>
                                <td>
                                    <input type="text" name="shipping_address[]" value="{!! $item->shipping_address !!}"
                                        hidden="">
                                    {{ $item->shipping_address }}
                                </td>
                                <td>
                                    <input type="text" name="shipping_from[]" value="{!! $item->shipping_from !!}" hidden="">
                                    {{ $item->shipping_from }}
                                </td>
                                <td>
                                    <input type="text" name="name[]" value="{!! $item->name !!}" hidden="">
                                    {{ $item->name }}
                                </td>
                                <td>
                                    <input type="text" name="company_name[]" value="{!! $item->company_name !!}" hidden="">
                                    {{ $item->company_name }}
                                </td>
                                <td>
                                    <input type="text" name="phone[]" value="{!! $item->phone !!}" hidden="">
                                    {{ $item->phone }}
                                </td>
                                <td>
                                    <input type="text" name="comments[]" value="{!! $item->comments !!}" hidden="">
                                    {{ $item->comments }}
                                </td>
                                <td>
                                    <input type="text" name="cart_id[]" value="{!! $item->cart_id !!}" hidden="">
                                    {{ $item->cart_id }}
                                </td>
                                <td>
                                    <input type="text" name="article_name[]" value="{!! $item->article_name !!}" hidden="">
                                    {{ $item->article_name }}
                                </td>
                                <td>
                                    <input type="text" name="prod_qty[]" value="{!! $item->prod_qty !!}" hidden="">
                                    {{ $item->prod_qty }}
                                </td>
                                <td>
                                    <a type="submit" href="{{ 'orders/delete/' . $item['id'] }}"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
            <hr>
        </div>
    </div>
</body>
