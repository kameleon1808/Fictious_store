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
            <form action="{{ route('admin.legals') }}" method="POST">
                @csrf
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Id </th>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Age</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($legals as $key => $item)
                            <tr>
                                <td>
                                    <input type="text" name="user_id[]" value="{!! $item->id !!}" hidden="">
                                    {{ $item->id }}
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
                                    <input type="text" name="email[]" value="{!! $item->email !!}" hidden="">
                                    {{ $item->email }}
                                </td>
                                <td>
                                    <input type="text" name="username[]" value="{!! $item->username !!}" hidden="">
                                    {{ $item->username }}
                                </td>

                                <td>
                                    <input type="text" name="address[]" value="{!! $item->address !!}" hidden="">
                                    {{ $item->address }}
                                </td>
                                <td>
                                    <input type="text" name="phone[]" value="{!! $item->phone !!}" hidden="">
                                    {{ $item->phone }}
                                </td>
                                <td>
                                    <input type="text" name="age[]" value="{!! $item->age !!}" hidden="">
                                    {{ $item->age }}
                                </td>
                                <td>
                                    <a type="submit" href="{{ 'legals/delete/' . $item['id'] }}"
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
