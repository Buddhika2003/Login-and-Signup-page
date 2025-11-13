<?php
session_start();

require_once "includes/config.php";
require_once "includes/validate.php";

if(isset($_SESSION['username'])){
   ?> <!DOCTYPE html>
    <html>
    <body>
        <?php
            echo "hi" .htmlentities($_SESSION['username']);
        ?><br>
                <a href="logout.php">Logout</a>
         </body>
    </html>
    <?php
    exit;
}

if ($_POST) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        
        $stmt = $pdo->prepare('SELECT username, password FROM users WHERE username = :username');
        $stmt->execute([':username' => $username]);
        $result = $stmt->fetch();

        
        if ($result && password_verify($password, $result['password'])) {
            $_SESSION['username'] = $username;
            header('Location:index.php');
            exit;
        } else {
            $error = "Incorrect username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/jquery-3.7.1.min.js"></script>
</head>
<body>
    <table class="interface">
        <form method="post" action="" id="form">
            <?php if (!empty($error)): ?>
            <tr>
                <td colspan="2" style="color:red;"><?php echo $error; ?></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Login"></td>
            </tr>
        </form>
    </table>
</body>
</html>