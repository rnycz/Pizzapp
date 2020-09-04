<!-- strona kontaktowa zawsze dostępna dla użytkownika -->
<html>
<head>
<title>Kontakt</title>
<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    
<link rel="stylesheet" href="style.php">
    
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
		<h2> Formularz kontaktowy</h2>
		</div>
<div class="container"> 
    <div class="jumbotron">
      <div class="jumbotron-content">
<form> <!-- formularz nic nie wysyła, tylko jest -->
  <div class="form-group">
    <label for="email">E-mail:</label>
    <input type="email" class="form-control">
  </div>
  <div class="form-group">
    <label for="imie">Imię:</label>
    <input type="imie" class="form-control">
  </div>
  <div class="form-group">
    <label for="select">Temat zapytania: </label>
    <select class="form-control">
      <option>menu</option>
      <option>dostawa</option>
      <option>płatność</option>
      <option>rejestracja</option>
      <option>twoje dane</option>
    </select>
  </div>
  <div class="form-group">
    <label for="textarea">Opisz swoje pytanie: </label>
    <textarea class="form-control" rows="3"></textarea>
  </div>
  <input type="submit" class="btn btn-warning btn-large" value="Wyślij" >
</form>
	</div></div></div>
    
    <!-- dane kontaktowe + obrazki dla opisu -->
<div class="container"> 
<div class="row">
    <div class="col-4">
<img src="image/loka.png" width="60" height="50">Katowice, ul. 1 maja 48
 </div>
 <div class="col-4">
<img src="image/tel.png" width="70" height="50">500 600 123
</div>
 <div class="col-4">
<img src="image/mail.png" width="80" height="50">pizzapp@pizza.com
</div>
    </div></div>
    <!-- /dane kontaktowe + obrazki dla opisu -->
    
<br />
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