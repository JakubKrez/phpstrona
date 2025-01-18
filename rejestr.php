<?php
    require_once('polaczenie.php');
    session_start();
    if ((isset( $_POST['imie'])) && (isset( $_POST['nazwisko'])) && (isset( $_POST['haslo'])) && (isset( $_POST['mail'])) )
    {
        $test=true;
        $imie = $_POST['imie'];
        if ((strlen($imie)<3) || (strlen($imie)>20))
        {
            $test=false;
            $_SESSION['e_imie'] = "Imie musi mieć od 3 do 20 liter";
        }
        $nazwisko= $_POST['nazwisko'];
        if ((strlen($nazwisko)<3) || (strlen($nazwisko)>40))
        {
            $test=false;
            $_SESSION['e_nazwisko'] = "Nazwisko musi mieć od 3 do 40 liter";
        }
        $haslo= $_POST['haslo'];
        if ((strlen($haslo)<5) || (strlen($haslo)>40))
        {
            $test=false;
            $_SESSION['e_haslo'] = "Hasło musi mieć od 5 do 30 znaków";
        }
        $phaslo= $_POST['phaslo'];
        if ($_POST['haslo'] != $_POST['phaslo'])
        {
            $test=false;
            $_SESSION['e_phaslo'] = "Hasła nie są identyczne";
        }
        $mail= $_POST["mail"];
        $mailB = filter_var($mail, FILTER_SANITIZE_EMAIL);
        if((filter_var($mailB,FILTER_VALIDATE_EMAIL)==false) || ($mailB!=$mail))
        {
            $test=false;
            $_SESSION["e_mail"] = "Zły adres e-mail";
        }
        // $haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);
        if ($test==true)
        {        
            $sql = "INSERT INTO uzytkownicy (`imie`,`nazwisko`,`haslo`,`email`) VALUES ('$imie','$nazwisko','$haslo','$mail')";
            if(mysqli_query($conn,$sql ))
            {   
                header("Refresh: 3; URL=login.php");
                echo"Zarejestrowano"; exit();
                
            }
            mysqli_close($conn);
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <style>
        .error{
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form method="post">
        Imie: <input type="text" name="imie"> <br/>
        <?php
        if (isset($_SESSION['e_imie']))
        {
            echo'<div class="error">'.$_SESSION['e_imie'].'</div>';
            unset($_SESSION['e_imie']);
        }
        ?>
        Nazwisko: <input type="text" name="nazwisko"> <br/>
        <?php
        if (isset($_SESSION['e_nazwisko']))
        {
            echo'<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
            unset($_SESSION['e_nazwisko']);
        }
        ?>
        Hasło: <input type="password" name="haslo"> <br/>
        <?php
        if (isset($_SESSION['e_haslo']))
        {
            echo'<div class="error">'.$_SESSION['e_haslo'].'</div>';
            unset($_SESSION['e_haslo']);
        }
        ?>
        Powtórz haslo: <input type="password" name="phaslo"> <br/>
        <?php
        if (isset($_SESSION['e_phaslo']))
        {
            echo'<div class="error">'.$_SESSION['e_phaslo'].'</div>';
            unset($_SESSION['e_phaslo']);
        }
        ?>
        E-mail: <input type="email" name="mail"> <br/>
        <?php
        if (isset($_SESSION['e_mail']))
        {
            echo'<div class="error">'.$_SESSION['e_mail'].'</div>';
            unset($_SESSION['e_mail']);
        }
        ?>
        <input type="submit" value="Rejestracja">
    </form>
</body>
</html>