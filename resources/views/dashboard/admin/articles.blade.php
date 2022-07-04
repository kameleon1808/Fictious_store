<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard | Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.articles') }}" method="POST">
                @csrf
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Id </th>
                            <th>Slug </th>
                            <th>Name </th>
                            <th>Details</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $key => $item)
                            <tr>
                                <td>
                                    <input type="text" name="id[]" value="{!! $item->id !!}" hidden="">
                                    {{ $item->id }}
                                </td>
                                <td>
                                    <input type="text" name="slug[]" value="{!! $item->slug !!}" hidden="">
                                    {{ $item->slug }}
                                </td>
                                <td>
                                    <input type="text" name="name[]" value="{!! $item->name !!}" hidden="">
                                    {{ $item->name }}
                                </td>
                                <td>
                                    <input type="text" name="details[]" value="{!! $item->details !!}" hidden="">
                                    {{ $item->details }}
                                </td>
                                <td>
                                    <input type="text" name="category[]" value="{!! $item->category !!}" hidden="">
                                    {{ $item->category }}
                                </td>
                                <td>
                                    <input type="text" name="price[]" value="{!! $item->price !!}" hidden="">
                                    {{ $item->price }}
                                </td>
                                <td>
                                    <a type="submit" href="{{ 'articles/delete/' . $item['id'] }}"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </td>
                        </tr>
                    </tbody>
                </table>
            </form>

            <div class="col-md-4">
                <form action="{{ route('admin.articles.addArticles') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" placeholder="Enter slug" name="slug_add">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name_add">
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <input type="text" class="form-control" placeholder="Enter details" name="details_add">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" placeholder="Enter category" name="category_add">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" placeholder="Enter price" name="price_add">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </form>
            </div>

        </div>
    </div>
</body>
