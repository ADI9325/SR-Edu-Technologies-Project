<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body class="d-flex align-items-center min-vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Welcome, {{ $user->name }}</h4>
                    </div>
                    <div class="card-body text-center">
                        <div id="logout-message" class="alert alert-success" style="display: none;"></div>
                        <p>Email: {{ $user->email }}</p>
                        <button id="logout-button" class="btn btn-danger btn-block">Logout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#logout-button').on('click', function() {
                $.ajax({
                    url: "{{ route('logout') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#logout-message').text('Logged out successfully! Redirecting to login...').fadeIn().delay(2000).fadeOut(function() {
                            window.location.href = "{{ route('login') }}";
                        });
                    },
                    error: function(response) {
                        alert('Error logging out!');
                    }
                });
            });
        });
    </script>
</body>
</html>
