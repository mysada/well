<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Poppins', 'Arial', 'Avenir Next Georgian', Arial!important;
        }
        header {

        }
        .navbar-brand {
            font-size: 56px;
            font-weight: 700;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar a {
            text-decoration: none;
            color: #333;
        }
        .sidebar a:hover {
            color: #007bff;
        }

        .stats {
            margin-top: 50px;
            margin-bottom: 50px;
            border-radius: 10px;
        }

        .stat {
            width: 180px;
            height: 220px;
            margin-right: 20px;
            background-color: #00AB7A;
            display: flex;
            flex-direction: column;
            flex: 1;
            border-radius: 10px;
            color: #fff;
        }

        .text-content {
            margin-top: 50px;
            margin-left: 30px;
        }

        .text-content h3 {
            font-size: 34px;
            font-weight: 700;
        }

        .text-content p {
            font-size: 18px;
        }

        footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
        }
        footer a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        footer a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WELL. Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="sidebar p-3">
            <nav>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reviews</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="container-fluid p-4">
            <!-- Data Section -->
            <section class="stats d-flex justify-content-around">
                <div class="stat">
                    <div class="text-content">
                        <h3>Total Products</h3>
                        <p>150</p>
                    </div>
                </div>
                <div class="stat">
                    <div class="text-content">
                        <h3>Total Users</h3>
                        <p>1200</p>
                    </div>
                </div>
                <div class="stat">
                    <div class="text-content">
                        <h3>Total Orders</h3>
                        <p>300</p>
                    </div>
                </div>
            </section>


            <!-- Log Table -->
            <section class="logs">
                <h2>Entry Logs</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Message</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>User logged in</td>
                            <td>2024-08-08 12:00:00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product added</td>
                            <td>2024-08-08 12:05:00</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Order placed</td>
                            <td>2024-08-08 12:10:00</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <!-- Footer -->
    <footer>
        <nav>
            <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Terms of Service</a></li>
            </ul>
        </nav>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
