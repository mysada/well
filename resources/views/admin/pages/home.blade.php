@extends('layouts.admin')
@vite('resources/adminsass/admin_dashboard.scss')
@section('title', 'Dashboard')

@section('content')
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
                <tr>
                    <td>4</td>
                    <td>User logged in</td>
                    <td>2024-08-08 12:00:00</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Product added</td>
                    <td>2024-08-08 12:05:00</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Order placed</td>
                    <td>2024-08-08 12:10:00</td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
