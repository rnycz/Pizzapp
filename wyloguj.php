<!-- plik obsługujący wylogowywanie użytkownika -->
<?php
	session_start();	
	session_unset();	
	header('Location: logowanie.php');
	$_SESSION['wylogowano'] = '<br /><span style="color:red"> Wylogowano </span><br />
	<p>Zaloguj się ponownie!</p>';

?>