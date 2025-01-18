<?php
    session_start();
    require_once('polaczenie.php');
    if ($conn->connect_errno!=0)
    {
        echo"ERROR: ".$conn->connect_errno;
    }else{
        $sql = "SELECT nazwa FROM produkty";
        if($result = @$conn->query($sql))
        {
            $produkt = $result->fetch_assoc();
        }
        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkty</title>
</head>
<body>
    <?php
        echo"<p> Witaj ".$_SESSION['imie'].'![<a href="logout.php">Wyloguj się</a>]</p>';
        
    ?>
    <form action="">



    </form>
    
</body>
</html>