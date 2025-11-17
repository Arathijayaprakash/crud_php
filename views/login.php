<?php
session_start();
include __DIR__ . '/../controllers/loginController.php';
include __DIR__ . '/../config/db_config.php';

$loginController = new LoginController($conn);
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $loginController->login($_POST);
    if ($result === true) {
        header('Location: dashboard.php');
        exit;
    } else {
        $error = $result;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form id='loginForm' method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input class="form-control" type="text" name='username' id='username' placeholder="Username">
                    <small class="text-danger d-none" id="usernameError">Username is required.</small>

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" name='password' id='password' placeholder="Password">
                    <small class="text-danger d-none" id="passwordError">Password is required.</small>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                let isValid = true;
                const username = $('#username').val().trim();
                if (username === '') {
                    $('#usernameError').removeClass('d-none');
                    isValid = false;
                } else {
                    $('#usernameError').addClass('d-none');
                }

                const password = $('#password').val().trim();
                if (password === '') {
                    $('#passwordError').removeClass('d-none');
                    isValid = false;
                } else {
                    $('#passwordError').addClass('d-none');
                }

                if (!isValid) {
                    e.preventDefault();
                }
            })
        })
    </script>
</body>

</html>