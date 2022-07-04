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
            <h4>Admin Dashboard</h4>
            <hr>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">{{ auth()->guard('admin')->user()->name }}</td>
                        <td>{{ auth()->guard('admin')->user()->email }}</td>
                        <td>{{ auth()->guard('admin')->user()->phone }}</td>
                        <td>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                    Logout
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>

            <a href="{{ route('admin.users') }}" type="submit"
                class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                Users
            </a>
            <a href="{{ route('admin.legals') }}" type="submit"
                class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                Legals
            </a><a href="{{ route('admin.orders') }}" type="submit"
                class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                Orders
            </a><a href="{{ route('admin.carts') }}" type="submit"
                class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                Carts
            </a><a href="{{ route('admin.articles') }}" type="submit"
                class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                Articles
            </a>

            <hr>

            {{-- ----------------------------------------------------------------------------------------------- --}}

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
            </script>
</body>

</html>
