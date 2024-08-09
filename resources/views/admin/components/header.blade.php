<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

    <style>
        .stats {
            margin-top: 50px;
            margin-bottom: 80px;
            border-radius: unset!important;
        }

        .stat {
            width: 180px;
            height: 220px;
            margin-right: 20px;
            background-color: #00AB7A;
            display: flex;
            flex-direction: column;
            flex: 1;
            border-radius: unset!important;
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

        .logs h2{
            font-weight: 700;
            margin-bottom: 30px;
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
