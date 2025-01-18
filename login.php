<?php
session_start();
if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
{
    header('Location: strona.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    </script>
</head>
<body>
    <form action="logins.php" method="post">
        E-mail: <input type="email" name="mail"> <br/>
        Hasło: <input type="password" name="haslo"><br/>  
        <input type="submit" value="Zaloguj"></a>
        <label for="">
        <a href="rejestr.php"><input type="button" value="Zarejestruj"></a>
        </label>
    </form>
    <?php
     if(isset($_SESSION["blad"]))
     {
     echo $_SESSION['blad'];
     }
    ?>
</body>
    
</body>
</html>