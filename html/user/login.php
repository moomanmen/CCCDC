<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <form name="login" action="authenticate.php" method="POST">
            Username: <input type='text' name='username'></br>
            Password: <input type='password' name='password'></br>
            <input type='submit' value='Login'>
            <?php if (isset($_SESSION['login_err'])) {echo $_SESSION['login_err']; } ?></br>
        </form>
        
        <?php
        $_SESSION['login_err'] = '';
        ?>
    </body>
</html>
