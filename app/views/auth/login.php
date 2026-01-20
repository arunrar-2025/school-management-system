<?php
    // Import required files
    require_once __DIR__ . '/../../core/Auth.php';

    $error = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (Auth::login($email, $password)) {
            header("Location: /school-management-system/public/?route=dashboard");
            exit;
        } else {
            $error = "Invalid credentials";
        }
    }
?>

<h2>Login</h2>

<?php if($error): ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>