<!-- sprawdzanie sesji -->
<?php
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
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
  <?php //obliczenia związane z zamówieniem
  $supreme = $_POST['pizza1'];
  $cenasupreme = $supreme * 28;
  $capri = $_POST['pizza2'];
  $cenacapri = $capri * 25;
  $zwyczajna = $_POST['pizza3'];
  $cenazwyczajna = $zwyczajna * 25;
  $kurczak = $_POST['pizza4'];
  $cenakurczak = $kurczak * 30;
  $dom = $_POST['pizza5'];
  $cenadom = $dom * 27;
  $mieszana = $_POST['pizza6'];
  $cenamieszana = $mieszana * 38;
  $suma = $cenasupreme + $cenacapri + $cenazwyczajna + $cenakurczak + $cenadom + $cenamieszana;
  $ilosc = $supreme + $capri + $zwyczajna + $kurczak + $dom + $mieszana;
  ?>
<div class="container">
<div class="jumbotron">
<div class="content">
    <!-- tabelka podsumowująca zamówienie -->
<table class='table'>
  <thead>
    <tr>
      <th></th>
      <th>Nazwa</th>
      <th>Ilość</th>
      <th>Cena</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope='row'>1</th>
      <td>Pizza Supreme</td>
	  <td><?php echo $supreme ?></td>
	  <td><?php echo $cenasupreme ?> zł</td>
    </tr>
    <tr>
      <th scope='row'>2</th>
      <td>Pizza Capricciosa</td>
      <td><?php echo $capri ?></td>
	  <td><?php echo $cenacapri ?> zł</td>
    </tr>
    <tr>
      <th scope='row'>3</th>
      <td>Pizza Zwyczajna</td>
	  <td><?php echo $zwyczajna ?></td>
	  <td><?php echo $cenazwyczajna ?> zł</td>
    </tr>
	    <tr>
      <th scope='row'>4</th>
      <td>Pizza Kurczakowa</td>
	  <td><?php echo $kurczak ?></td>
	  <td><?php echo $cenakurczak ?> zł</td>
    </tr>
	    <tr>
      <th scope='row'>5</th>
      <td>Pizza Domowa</td>
	  <td><?php echo $dom ?></td>
	  <td><?php echo $cenadom ?> zł</td>
    </tr>
	    <tr>
      <th scope='row'>6</th>
      <td>Pizza Mieszana</td>
	  <td><?php echo $mieszana ?></td>
	  <td><?php echo $cenamieszana ?> zł</td>
    </tr>
  </tbody>
</table>
<p style="font-size:20px"><b>Wartość zamówienia: <?php echo $suma ?> zł</b></p>
    <!-- /tabelka podsumowująca zamówienie -->
  <hr style="height: 0.1%; background: black;">	

  <form method="post" action="zamowienie.php" name="user-info">
<h2> Wybierz formę płatności </h2>
<hr style="height: 0.1%; background: black;">
	<div class="form-group"> <!-- realizacja płatności nie zrobiona, nie wymagana do projektu studenckiego, można skończyć -->
		<select class="form-control" name="platnosc">
		<option>BLIK</option>
		<option>DotPay</option>
		<option>PayU</option>
	</select>
	</div>	
	<input type="submit" class="btn btn-warning btn-lg" value="PŁACĘ">
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