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
            <form action="{{ route('admin.carts') }}" method="POST">
                @csrf
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Id </th>
                            <th>Article Id </th>
                            <th>User Id </th>
                            <th>Legal Id </th>
                            <th>Product quantity</th>
                            <th>Created at</th>
                            <th>Updated at</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $key => $item)
                            <tr>
                                <td>
                                    <input type="text" name="id[]" value="{!! $item->id !!}" hidden="">
                                    {{ $item->id }}
                                </td>
                                <td>
                                    <input type="text" name="article_id[]" value="{!! $item->article_id !!}" hidden="">
                                    {{ $item->article_id }}
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
                                    <input type="text" name="prod_qty[]" value="{!! $item->prod_qty !!}" hidden="">
                                    {{ $item->prod_qty }}
                                </td>
                                <td>
                                    <input type="text" name="created_at[]" value="{!! $item->created_at !!}" hidden="">
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    <input type="text" name="updated_at[]" value="{!! $item->updated_at !!}" hidden="">
                                    {{ $item->updated_at }}
                                </td>
                                <td>
                                    <a type="submit" href="{{ 'carts/delete/' . $item['id'] }}"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>

        </div>
    </div>
</body>
