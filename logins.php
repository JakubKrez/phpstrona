<?php
    session_start();
    require_once('polaczenie.php');
    if ($conn->connect_errno!=0)
    {
        echo"ERROR: ".$conn->connect_errno;
    }else{
        $mail= $_POST['mail'];
        $haslo=$_POST['haslo'];
        $sqls = "SELECT * FROM uzytkownicy WHERE email='$mail' AND haslo='$haslo'";
        if($result = @$conn->query($sqls))
        {
            $user =$result->num_rows;
            if($user > 0)
            {
                $_SESSION['zalogowany']=true;
                $row = $result->fetch_assoc();
                $_SESSION['imie']= $row['imie'];
                $_SESSION['mail']= $row['email'];
                
                unset($_SESSION['blad']);
                $result->free_result();
                header('Location: strona.php');
            }else{
                $_SESSION['blad']='<span style="color:red;">Nieprawidłowy E-mail lub hasło!</span>';
                header('Location: login.php');
                
            }
        }
        $conn->close();
    }




?>