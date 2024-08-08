<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            padding: 20px;
            border-right: 1px solid #dee2e6;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .container {
            flex: 1;
            padding: 20px;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        .brand-logo img {
            height: 50px;
        }
        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 20px;
        }
        nav ul li {
            margin: 0;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="brand-logo">
                <img src="{{ asset('images/logo/header_logo.jpg') }}" alt="Brand Logo">
            </div>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Users</a></li>
            </ul>
        </nav>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar">
        <nav>
            <ul>
                <li><a href="#">Products</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Payments</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Reviews</a></li>
            </ul>
        </nav>
    </aside>


    <!-- Main Content -->
    <main>
        <div class="container">
             <!-- Data Section -->
            <section class="stats">
                <div class="stat">
                    <h3>Total Products</h3>
                    <p>150</p>
                </div>
                <div class="stat">
                    <h3>Total Users</h3>
                    <p>1200</p>
                </div>
                <div class="stat">
                    <h3>Total Orders</h3>
                    <p>300</p>
                </div>
            </section>

            <!-- Log Table -->
            <section class="logs">
                <h2>Entry Logs</h2>
                <table>
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
        </div>
    </main>


    <!-- Footer -->
    <footer>
        <nav>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </nav>
    </footer>


</body>
</html>
