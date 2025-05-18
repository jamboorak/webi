<?php
 session_start();
 
 $errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
 ];
 $activeForm = $_SESSION['active_form'] ?? 'login';

 

 function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>": '';
 }

 function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active': '';
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url(pic.jpg); background-size: contain; height: 300px;">
    <div class="container">
        <div class="form-box <?= isActiveForm('login', $activeForm);?>" id="login-form">
            <form action="login_register.php" method="post">
                <h1>Login</h1>
                <?= showError($errors['login']); ?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>Dont have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
            </form>
        </div>
        <div class="form-box <?= isActiveForm('register', $activeForm);?>" id="register-form">
            <form action="login_register.php" method="post">
                <h1>Register</h1>
                <?= showError($errors['register']); ?>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="">--Select role</option>
                    <option value="user">OJT</option>
                    <option value="admin">Part-Time</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>