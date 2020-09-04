<!-- sprawdzanie sesji -->
<?php
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit();
	}	
?>
<html>
<head>
<title>Twoje konto</title>
<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="konto">
    
<link rel="stylesheet" href="style.php"> 
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- menu główne -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Pizzapp</a>

      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
         
          <li class="nav-item">
            <a class="nav-link" href="rejestracja.php">Rejestracja</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logowanie.php">Logowanie</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="konto.php">Twoje konto</a>
          </li>	
		  <li class="nav-item">
            <a class="nav-link" href="menu.php">Menu</a>
          </li>		  
		  <li class="nav-item">
            <a class="nav-link" href="kontakt.php">Kontakt</a>
          </li>
        </ul>
          <span class="navbar-text">
      <a href="wyloguj.php">Wyloguj się!</a>
          </span>
      </div>
    </div>
  </nav>
<!-- /menu główne -->
    
	<br />
<div class="container">
  <div class="jumbotron">
<div class="content">
	 <?php //gdy zamówienie złożone
if(isset($_SESSION['licz_ok'])){
	echo $_SESSION['licz_ok'];
	unset($_SESSION['licz_ok']);
}
?>
	<h1>Twoje konto</h1>
	<hr style="height: 0.1%; background: black;">
<?php //wyświetlanie poszczególnych wartości - dane użytkownika
echo "<br /><p class='dane'>Witaj ".$_SESSION['user'].'!<br /><br />
Logowanie się powiodło. Sprawdź czy wprowadzone dane są poprawne.</p><br />
<hr style="height: 0.1%; background: black;">
<h2>Twoje dane</h2>
<hr style="height: 0.1%; background: black;">
<div class="row">
 <div class="col">
  <p class="text-right">Imie: </p>
  <p class="text-right">Nazwisko: </p>
  <p class="text-right">E-mail: </p>
  <p class="text-right">Miasto: </p>
  <p class="text-right">Ulica: </p>
  <p class="text-right">Numer domu: </p>
  <p class="text-right">Numer telefonu: </p>
  <p class="text-right">Kod pocztowy: </p>
 </div>
 <div class="col">
  <p class="text-left">'.$_SESSION['imie'].'</p>
  <p class="text-left">'.$_SESSION['nazwisko'].'</p>
  <p class="text-left">'.$_SESSION['email'].'</p>
  <p class="text-left">'.$_SESSION['miasto'].'</p>
  <p class="text-left">'.$_SESSION['ulica'].'</p>
  <p class="text-left">'.$_SESSION['numer_domu'].'</p>
  <p class="text-left">'.$_SESSION['numer_telefonu'].'</p>
  <p class="text-left">'.$_SESSION['kod_pocztowy'].'</p>
 </div>
</div>';
?>
<hr style="height: 0.1%; background: black;">
<h2> Złóż zamówienie </h2>
<hr style="height: 0.1%; background: black;">

    <!-- składanie zamówienia przez użytkownika -->
<form method="post" action="licz.php" name="zamowienie">
<div class="row">
  <div class="col">
    <img src="image/pizza2.jpg" class="rounded" width="250" height="150">
    <p>CAPRICCIOSA <br /><input type="number" name="pizza2" value="0"><b> Wybierz ilość</b></p>
  </div>
  <div class="col">
	<img src="image/pizza1.jpg" class="rounded" width="250" height="150" >
	<p>SUPREME <br /><input type="number" name="pizza1" value="0"><b> Wybierz ilość</b></p>
  </div>
</div>
<div class="row">
  <div class="col">
    <img src="image/pizza3.jpg" class="rounded" width="250" height="150">
    <p>ZWYCZAJNA <br /><input type="number" name="pizza3" value="0"><b> Wybierz ilość</b></p>
  </div>
  <div class="col">
	<img src="image/pizza4.jpg" class="rounded" width="250" height="150" >
	<p>KURCZAKOWA <br /><input type="number" name="pizza4" value="0"><b> Wybierz ilość</b></p>
  </div>
</div>
<div class="row">
  <div class="col">
    <img src="image/pizza5.jpg" class="rounded" width="250" height="150">
    <p>DOMOWA <br /><input type="number" name="pizza5" value="0"><b> Wybierz ilość</b></p>
  </div>
  <div class="col">
	<img src="image/pizza6.jpg" class="rounded" width="250" height="150" >
	<p>MIESZANA <br /><input type="number" name="pizza6" value="0"><b> Wybierz ilość</b></p>
  </div>
</div><br />
  <input type="submit" class="btn btn-warning" value="Podsumowanie">
</form>
    <!-- /składanie zamówienia przez użytkownika -->
</div></div></div>

    <!-- stopka -->
<footer class="bg-dark text-white static-bottom pt-4">
<div class="container">
    <ul class="list-unstyled list-inline text-center">
      <li class="list-inline-item">
        <a class="btn-floating btn-fb mx-1">
<img src="https://www.facebook.com/images/fb_icon_325x325.png" width="50" alt="Placeholder" class="rounded">
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-tw mx-1">
<img src="https://lh3.googleusercontent.com/2sREY-8UpjmaLDCTztldQf6u2RGUtuyf6VT5iyX3z53JS4TdvfQlX-rNChXKgpBYMw" width="50" alt="Placeholder" class="rounded">
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-gplus mx-1">
<img src="https://www.youtube.com/yts/img/yt_1200-vflhSIVnY.png" width="50" alt="Placeholder" class="rounded">
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-li mx-1">
<img src="https://cdn.pixabay.com/photo/2016/05/01/23/20/twitter-bird-1366218_960_720.png" width="50" alt="Placeholder" class="rounded">
        </a>
      </li>
    </ul>
  </div>
  <div class="footer-copyright text-center py-3">© 2020 Copyright: Pizzapp
  </div>
</footer>
    <!-- /stopka -->    
</body>
</html>