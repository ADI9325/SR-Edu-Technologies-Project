<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 1rem 1.5rem;
        }
        .card-body {
            padding: 1.5rem;
            font-size: 1rem;
            line-height: 1.6;
        }
        .card-body p {
            margin-bottom: 1rem;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }
        .btn-logout {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
        .btn-logout:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }
        .btn-logout:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <h4>Welcome, {{ $user->name }}</h4>
                    </div>
                    <div class="card-body text-center">
                        <p>Email: {{ $user->email }}</p>
                    </div>
                </div>

                <!-- New Content Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>The New Way to Success</h5>
                    </div>
                    <div class="card-body">
                        <p>Advance Progress</p>
                        <p>Transforming Education, One Innovative Solution at a Time. At SR Edu Tech, we're dedicated to redefining learning experiences, fostering creativity, and preparing learners for a brighter, more connected future. With cutting-edge technology and a passion for education, we're shaping the leaders of tomorrow.</p>
                    </div>
                </div>

                <!-- Other Content Sections -->

            </div>
        </div>
    </div>

    <footer class="footer">
        <button id="logout-button" class="btn-logout">Logout</button>
    </footer>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#logout-button').on('click', function() {
                $.ajax({
                    url: "{{ route('logout') }}",
                    type: 'POST',
                    success: function(response) {
                        window.location.href = "{{ route('login') }}";
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert('Error logging out!');
                    }
                });
            });
        });
    </script>
</body>
</html>
