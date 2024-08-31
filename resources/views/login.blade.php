<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body class="d-flex align-items-center min-vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <div id="error-message" class="alert alert-danger" style="display: none;"></div>
                        <div id="success-message" class="alert alert-success" style="display: none;"></div>
                        <form id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>New user? <a href="{{ route('register') }}">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#login-form').on('submit', function(e) {
                e.preventDefault();
                $('#error-message').hide();
                $('#success-message').hide();

                $.ajax({
                    url: "{{ url('/') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#success-message').text('Login successful! Redirecting to dashboard...').fadeIn().delay(2000).fadeOut(function() {
                            window.location.href = "{{ route('dashboard') }}";
                        });
                    },
                    error: function(response) {
                        $('#error-message').text(response.responseJSON.message).fadeIn();
                    }
                });
            });
        });
    </script>
</body>
</html>
