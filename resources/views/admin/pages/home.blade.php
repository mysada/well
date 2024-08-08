<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Orders</a></li>
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
