<?php
require_once 'includes/config.php';
require_once 'includes/validate.php';

session_start();

if (isset($_SESSION['username'])) {
  header('Location: signup2.php');
  exit;
}

$username        = '';
$password        = '';
$confirmpassword = '';
$firstname       = '';
$middlename      = '';
$lastname        = '';
$age             = '';
$email           = '';
$errors          = [];

if ($_POST) {
  if (isset($_POST['username'])) $username = trim($_POST['username']);
  if (isset($_POST['password'])) $password = $_POST['password'];
  if (isset($_POST['confirmpassword'])) $confirmpassword = $_POST['confirmpassword'];
  if (isset($_POST['firstname'])) $firstname = trim($_POST['firstname']);
  if (isset($_POST['middlename'])) $middlename = trim($_POST['middlename']);
  if (isset($_POST['lastname'])) $lastname = trim($_POST['lastname']);
  if (isset($_POST['age'])) $age = trim($_POST['age']);
  if (isset($_POST['email'])) $email = trim($_POST['email']);

  if ($error = validate_username($username)) $errors['username'] = $error;
  if ($error = validate_password($password)) $errors['password'] = $error;
  if ($error = validate_confirmpassword($password, $confirmpassword)) $errors['confirmpassword'] = $error;
  if ($error = validate_firstname($firstname)) $errors['firstname'] = $error;
  if ($error = validate_middlename($middlename)) $errors['middlename'] = $error;
  if ($error = validate_lastname($lastname)) $errors['lastname'] = $error;
  if ($error = validate_age($age)) $errors['age'] = $error;
  if ($error = validate_email($email)) $errors['email'] = $error;

  if (!$errors) {
    $stmt = $pdo->prepare('INSERT INTO users VALUES (:username, :password, :firstname, :middlename, :lastname, :age, :email)');
    $stmt->execute([
      'username'   => $username,
      'password'   => password_hash($password, PASSWORD_DEFAULT),
      'firstname'  => $firstname,
      'middlename' => $middlename,
      'lastname'   => $lastname,
      'age'        => $age,
      'email'      => $email
    ]);
    header('Location: index.php?success=1');
    exit;
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/validate.js"></script>
  </head>
  <body>
    <table class="interface">
    <form method="post" action="" id="form">
      <?php if ($errors) { ?>
      <tr><td colspan="2">Sorry, the following errors were found in your form:
          <p><i class="error">
            <?php foreach ($errors as $error) echo $error . '<br />'; ?>
          </i></p>
      </td></tr>
      <?php } ?>
      <tr><td>Username</td>
          <td><input id="username" type="text" maxlength="16" name="username" pattern="\w+" title="Only letters, numbers, and _ in usernames." value="<?php echo htmlentities($username); ?>" required />
      <tr><td>Password</td>
          <td><input type="password" minlength="8" name="password" value="<?php echo htmlentities($password); ?>" required /></td></tr>
      <tr><td>Confirm Password</td>
          <td><input type="password" minlength="8" name="confirmpassword" value="<?php echo htmlentities($confirmpassword); ?>" required /></td></tr>
      <tr><td>First Name</td>
          <td><input type="text" maxlength="32" name="firstname" value="<?php echo htmlentities($firstname); ?>" required /></td></tr>
      <tr><td>Middle Name (Optional)</td>
          <td><input type="text" maxlength="32" name="middlename" value="<?php echo htmlentities($middlename); ?>" /></td></tr>
      <tr><td>Last Name</td>
          <td><input type="text" maxlength="32" name="lastname" value="<?php echo htmlentities($lastname); ?>" required /></td></tr>
      <tr><td>Age</td>
          <td><input type="number" min="18" max="128" name="age" value="<?php echo htmlentities($age); ?>" required /></td></tr>
      <tr><td>Email (Optional)</td>
          <td><input type="email" maxlength="254" name="email" value="<?php echo htmlentities($email); ?>" /></td></tr>
      <tr><td colspan="2" align="center"><input class="safe" type="submit" value="Signup" /></td></tr>
      <tr><td colspan="2"><hr /></td></tr>
      <tr><td colspan="2">Already have an account? <a href="index.php">Login</a></td></tr>
    </form>
    </table>
  </body>
</html>
