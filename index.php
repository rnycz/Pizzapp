<!-- sprawdzanie sesji -->
<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: konto.php');
		exit();
	}

?>

<html lang="pl">
<head>
<meta charset="utf-8">
<title>Pizzapp</title>
<meta name="description" content="Formularz logowania pizzeri Pizzapp">
<meta name="keywords" content="formularz, logowanie, pizzeria, Pizzapp">
<meta name="author" content="Pizzapp">
<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> <!-- odnośnik do bootstrap -->

</head>
<body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- menu główne -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Pizzapp</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
      </div>
    </div>
  </nav>
<!-- /menu główne -->

  <div class="container">
  <br />
<center><img src="image/napis.png" ></center><br />
<p style="text-align: center; font-size:20px; font-family:georgia;">Na rynku działamy od niedawna, lecz nasze produkty na pewno sprostają Państwa oczekiwaniom. Złóż zamówienie, a dostarczymy je, pod wskazany adres podczas rejestracji, najszybciej jak to możliwe.<br /> <b>Życzymy smacznego!</b></p>
  </div>
<br />
<div class="container"> 
	<hr style="height: 0.1%; background: black;">
<h3>Nasze produkty to najwyższa jakość!</h3> 
<!-- div z obrazkami -->
<div class="row"> 
    <div class="col-3">
  <img src="image/pizza1.jpg" class="rounded float-left" width="100%">
  </div>
	<div class="col-3">
  <img src="image/pizza2.jpg" class="rounded float-left" width="100%">
  </div>
    <div class="col-3">
  <img src="image/pizza3.jpg" class="rounded float-left" width="100%">
  </div>
    <div class="col-3">
  <img src="image/pizza4.jpg" class="rounded float-left" width="100%">
  </div>
</div> 
<!-- /div z obrazkami -->
	<hr style="height: 0.1%; background: black;">
<h4>Jak złożyć zamówienie?</h4> 
<p style="text-align: justify; font-size:16px; font-family:arial;">
Aby złożyć zamówienie <a href="logowanie.php">zaloguj się</a> na swoje konto (jeśli go nie masz to <a href="rejestracja.php">zarejestruj się</a>), następnie sprawdż czy podane przez
Ciebie dane, podczas rejestracji, są prawidłowe. Wybierz Pizze, które chcesz zamówić i przejdź do podsumowania, teraz musisz już tylko opłacić zamówienie, a my zajmiemy się resztą.
</p>
</div>
<!-- stopka -->
<footer class="bg-dark text-white fixed-bottom pt-4">
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