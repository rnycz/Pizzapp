<?php //realizowanie rejestracji oraz walidacja podstawowych danych podanych przez użytkownika
session_start();
global $l1, $l2, $e, $h1, $h2, $r, $login, $email, $haslo1, $haslo2, $haslo_hash, $imie, $nazwisko, $miasto, $ulica, $nr_domu, $nr_tel, $kod_poczt;		
if(isset($_POST['imie'])){
	$imie=$_POST['imie'];
}
if(isset($_POST['nazwisko'])){
	$nazwisko=$_POST['nazwisko'];
}
if(isset($_POST['miasto'])){
	$miasto=$_POST['miasto'];
}
if(isset($_POST['ulica'])){
	$ulica=$_POST['ulica'];
}	
if(isset($_POST['nr_domu'])){
	$nr_domu=$_POST['nr_domu'];
}
if(isset($_POST['nr_tel'])){
	$nr_tel=$_POST['nr_tel'];
}
if(isset($_POST['kod_poczt'])){
	$kod_poczt=$_POST['kod_poczt'];
}
	
if(isset($_POST['login'])){
	$l1 = true;
	$login=$_POST['login'];
	if((strlen($login))<3 || (strlen($login)>20)){
		$l1 = false;
		$_SESSION['login_error1']="<div class='error'>Błąd! Login powinien mieć od 3 do 20 znaków</div>";
	}
}

if(isset($_POST['login'])){
	$l2 = true;
	if(!ctype_alnum($login)){
		$l2 = false;
		$_SESSION['login_error2']="<div class='error'>Błąd! Login nie może mieć znaków interpunkcyjnych</div>";
	}
}

if(isset($_POST['email'])){
	$e = true;
	$email=$_POST['email'];
	if(!preg_match('/^[a-z\d]+[\w\d.-]*@(?:[a-z\d]+[a-z\d-]+\.){1,5}[a-z]{2,6}$/i', $email)){
		$e = false;
		$_SESSION['email_error']="<div class='error'>Błąd! Zły adres e-mail</div>";
	}
}

if(isset($_POST['haslo1'])){
	$h1 = true;
	$haslo1=$_POST['haslo1'];
	if((strlen($haslo1))<8){
		$h1 = false;
		$_SESSION['haslo1_error']="<div class='error'>Błąd! Hasło jest za krótkie</div>";
	}
}

if((isset($_POST['haslo1'])) && (isset($_POST['haslo2']))){
	$h2 = true;
	$haslo2=$_POST['haslo2'];
	if($haslo1 != $haslo2){
		$h2 = false;
		$_SESSION['haslo2_error']="<div class='error'>Błąd! Hasła nie są takie same</div>";
	}
}

if((!isset($_POST['regulamin']))){
	$r = false;
	$_SESSION['regulamin_error']="<div class='error'>Musisz zaakceptować <a href='regulamin.php'>regulamin</a></div>";	
}else{
	$r = true;
}

$haslo_hash = password_hash($haslo2, PASSWORD_DEFAULT);
	require_once "connect.php";
	try{
		$con = new mysqli($host,$db_user,$db_pass,$db_name);
		if($con->connect_errno!=0){
			throw new Exception(mysqli_connect_errno);
		}else{
			$result = $con->query("Select id FROM uzytkownicy WHERE email='$email'");
			if(!$result) throw new Exception($con->error);
			
			$ile_takich_maili = $result->num_rows;
			$ile_takich_login = $result->num_rows;
			if($ile_takich_maili>0){
				$email = false;
				$_SESSION['email_error2'] = "<div class='error'>Istnieje już użytkownik o takim adresie email</div>";
			}
			if($ile_takich_login>0){
				$login = false;
				$_SESSION['login_error3'] = "<div class='error'>Istnieje już użytkownik o takim loginie</div>";
			}
			
		if($l1 == true && $l2 == true && $e == true && $h1 == true && $h2 == true && $r == true && $email == true && $login == true){
			if($con->query("INSERT INTO uzytkownicy (id, user, pass, email, imie, nazwisko, miasto, ulica, numer_domu, numer_telefonu, kod_pocztowy)
				VALUES (null, '$login', '$haslo2', '$email', '$imie', '$nazwisko', '$miasto', '$ulica', '$nr_domu', '$nr_tel', '$kod_poczt')")){
				header('Location: index.php');
				$_SESSION['rejestracja_ok']="<div class='udane'>Rejestracja udana! Zaloguj się.</div>";
			}else{
				throw new Exception($con->error);
			}
		}
		$con->close();
		}
	}catch(Exception $e){
		echo "Błąd serwera. Spróbuj ponownie później";
	}
	
?>
<html>
<head>
<title>Formularz rejestracji</title>
<link rel='stylesheet' href='style.php'>
<script src="https://www.google.com/recaptcha/api.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
	<br />
	<div class="container"> 
		<h2> Formularz rejestracji</h2>
		</div>
<div class="container"> 
    <div class="jumbotron">
      <div class="jumbotron-content">
<form method="post" name="user-info">
<div class="form-group">
<label for="login">Login:</label> 
<input type="text" class="form-control" name="login">
</div>
<?php //alerty w przypadku podania błędnych danych
if(isset($_SESSION['login_error1'])){
	echo $_SESSION['login_error1'];
	unset($_SESSION['login_error1']);
}
if(isset($_SESSION['login_error2'])){
	echo $_SESSION['login_error2'];
	unset($_SESSION['login_error2']);
}
if(isset($_SESSION['login_error3'])){
	echo $_SESSION['login_error3'];
	unset($_SESSION['login_error3']);
}
?>
<br />
<div class="form-group">
<label for="e-mail">E-mail:</label> 
<input type="email" class="form-control" name="email">
</div>
<?php //błędny adres email
if(isset($_SESSION['email_error'])){
	echo $_SESSION['email_error'];
	unset($_SESSION['email_error']);
}
if(isset($_SESSION['email_error2'])){
	echo $_SESSION['email_error2'];
	unset($_SESSION['email_error2']);
}
?>
<br />
<div class="form-group">
<label for="haslo1">Hasło:</label> 
<input type="password" class="form-control" name="haslo1">
</div>
<?php //zła forma hasła
if(isset($_SESSION['haslo1_error'])){
	echo $_SESSION['haslo1_error'];
	unset($_SESSION['haslo1_error']);
}
?>
<br />
<div class="form-group">
<label for="haslo2">Powtórz hasło:</label> 
<input type="password" class="form-control" name="haslo2">
</div>
<?php //źle powtórzone hasło
if(isset($_SESSION['haslo2_error'])){
	echo $_SESSION['haslo2_error'];
	unset($_SESSION['haslo2_error']);
}
?>
<br />
 <input type="checkbox" class="form-control" id="ok" name="regulamin" >
 <center><label for="ok">Akceptuję regulamin!</label>
 <?php //brak akceptacji regulaminu
if(isset($_SESSION['regulamin_error'])){
	echo $_SESSION['regulamin_error'];
	unset($_SESSION['regulamin_error']);
}
?>
</center> 
</div></div></div>
	<div class="container"> 
		<h3> Podaj niezbędne dodatkowe informacje</h3>
		</div>
<div class="container"> 
    <div class="jumbotron">
      <div class="jumbotron-content">
<div class="form-group">
<label for="imie">Imię: </label> 
<input type="text" class="form-control" name="imie"><br />
</div>
<div class="form-group">
<label for="nazwisko">Nazwisko: </label> 
<input type="text" class="form-control" name="nazwisko"><br />
</div>
<div class="form-group">
<label for="miasto">Miasto: </label> 
<input type="text" class="form-control" name="miasto"><br />
</div>
<div class="form-group">
<label for="ulica">Ulica: </label> 
<input type="text" class="form-control" name="ulica"><br />
</div>
<div class="form-group">
<label for="nr_domu">Numer domu: </label> 
<input type="text" class="form-control" name="nr_domu"><br />
</div>
<div class="form-group">
<label for="nr_tel">Numer telefonu: </label> 
<input type="text" class="form-control" name="nr_tel"><br />
</div>
<div class="form-group">
<label for="kod_poczt">Kod pocztowy: </label> 
<input type="text" class="form-control" name="kod_poczt"><br />
</div>
<div class="g-recaptcha" style="display:table; margin:auto;" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div><br />
<input type="submit" class="btn btn-warning btn-large" value="Zarejestruj się" name="rejestruj">
</form>
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
        <a class="btn-floating btn-ig mx-1">
<img src="https://lh3.googleusercontent.com/2sREY-8UpjmaLDCTztldQf6u2RGUtuyf6VT5iyX3z53JS4TdvfQlX-rNChXKgpBYMw" width="50" alt="Placeholder" class="rounded">
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-yt mx-1">
<img src="https://www.youtube.com/yts/img/yt_1200-vflhSIVnY.png" width="50" alt="Placeholder" class="rounded">
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-tw mx-1">
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