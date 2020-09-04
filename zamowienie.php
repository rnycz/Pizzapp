<!-- sprawdzanie sesji -->
<?php
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}	
?>

<!-- dodawanie przykładowego zamówienia do bazy danych -->
  <?php
  	require_once "connect.php";
		$con = new mysqli($host,$db_user,$db_pass,$db_name);
		if($con->connect_errno!=0){
			throw new Exception(mysqli_connect_errno);
		}else			
			if($con->query("INSERT INTO zamowienie (id, nazwa, ilosc, cena, id_klienta)
				VALUES (null, 'Supreme',1,28,17)")){
				header('Location: konto.php');
				$_SESSION['licz_ok']="<div class='udane' style='font-size:20px'>Zamówienie złożone!</div>";
			}
		
		$con->close();
			
  ?>
