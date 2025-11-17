<?php
session_start();
include __DIR__ . '/../config/db_config.php';
include __DIR__ . '/../controllers/loginController.php';

$loginController = new LoginController($conn);
if (!$loginController->isLoggedIn()) {
    header('Location: ../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'CRUD Application'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .sidebar a.active {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <h4>Welcome <?php echo $_SESSION['username'] ?></h4>
                <a href="../dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">Dashboard</a>
                <a href="staffs/index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Staffs</a>
                <a href="/crud/views/logout.php" class="btn btn-danger mt-3">Logout</a>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <div class="container">