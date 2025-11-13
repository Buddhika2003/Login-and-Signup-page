<?php
    $_SESSION =[];
    setcookie(session_name(), FALSE);
    session_destroy();
    header('Location:index.php');
?>

<!DOCTYPE html>
<html>
<head><title>Logout</title>
</head>
<body>
    
</body>
</html>