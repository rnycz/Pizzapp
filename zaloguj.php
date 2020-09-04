<!-- plik realizujący logowanie użytkownika do strony, weryfikacja czy podany login i hasło są prawidłowe -->
<?php
session_start();
     
    if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
    {
        header('Location: index.php');
        exit();
    }
require_once"connect.php";
$conn = @new mysqli($host,$db_user,$db_pass,$db_name);

if($conn->connect_errno!=0)
{
	echo"Error: ".$conn->connect_errno;	
}
else{
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$haslo_hash = password_hash($haslo, PASSWORD_DEFAULT); //hashowanie hasła - dla testu

$sql = "Select * from uzytkownicy where binary user='$login' and binary pass='$haslo'";

if($result = @$conn->query($sql))
{
	$licz_user = $result->num_rows;
	if($licz_user>0)
	{
		$_SESSION['zalogowany'] = true;
        //wczytywanie poszczególnych wartości
		$wiersz = $result->fetch_assoc();
		$_SESSION['user'] = $wiersz['user'];
		$_SESSION['imie'] = $wiersz['imie'];
		$_SESSION['nazwisko'] = $wiersz['nazwisko'];
		$_SESSION['miasto'] = $wiersz['miasto'];
		$_SESSION['ulica'] = $wiersz['ulica'];
		$_SESSION['numer_domu'] = $wiersz['numer_domu'];
		$_SESSION['numer_telefonu'] = $wiersz['numer_telefonu'];
		$_SESSION['kod_pocztowy'] = $wiersz['kod_pocztowy'];
		$_SESSION['email'] = $wiersz['email'];
		
		unset($_SESSION['blad']);
		$result->free_result();

		header('Location: konto.php');
	}
	else{
		$_SESSION['blad'] = "<br /><span style='color:red'> Nieprawidłowy login lub hasło!<br /></span>
		<p>Spróbuj zalogować się ponownie, a jeśli nie masz konta<a href='rejestracja.php'> zarejestruj się!</a></p>";
		unset($_SESSION['wylogowano']);
		header('Location: index.php');
	}
}
$conn->close();
}
?>