@include('components.header.header')

<body>
    <div class="container">
        <div class="row">
            <form action="{{ url('legal/update-pwd/' .auth()->guard('legal')->user()->id) }}" method="post">
                @csrf
                @method('PUT')

                <h1>Update your password</h1>

                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="user_id" value="{{ auth()->guard('legal')->user()->id }}">
                    <input type="text" value="{{ auth()->guard('legal')->user()->name }}" class="form-control"
                        readonly name="name_ed">
                </div>

                <div class="form-group">
                    <label>Current password</label>
                    <input type="hidden" name="pwd" value="{{ auth()->guard('legal')->user()->password }}">

                    <input type="password" value="" class="form-control" name="pwd_old">
                </div>

                <div class="form-group">
                    <label>New password</label>
                    <input type="password" value="" class="form-control" name="pwd_new"><br>
                </div>

                <button type="submit" class="btn btn-primary">Edit</button><br>
                <a href="{{ url('/legal/home') }}">Back</a>

            </form>
        </div>
    </div>

</body>

</html>
@include('components.footer.footer')
