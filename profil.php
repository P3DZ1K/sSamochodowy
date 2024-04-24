<?php
    require_once "connect.php";
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Moja Strona Profilowa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 70%;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      
    }

    .profile-picture {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin: 0 auto 20px;
      display: block;
      background-color: #ccc;
    }

    table {
      max-width: 20%;
      border-collapse: collapse;
      margin-bottom: 20px;
      margin: auto;
      border-spacing: 0;
    }

    table td, table th {
      padding: 10px;
      border: 1px solid #ddd;
      font-size: 18px;
      border-top: 1px solid #ddd;
      padding: 5px 12px;
      text-align: left;
      vertical-align: top;
    }

    table th {
      background-color: #f4f4f4;
    }
    @media (max-width: 1000px) {
      /* Dla urządzeń o szerokości do 600px */
      .container {
        padding: 10px;
      }
      .profile-picture {
        width: 100px;
        height: 100px;
      }
      
	    .rwd-table {
		    overflow-x:scroll;
	}	
  .table td, table th{
    font-size:10px;
  }
}
@media (max-width: 700px){
  .table td, table th{
    font-size:7px;
  }
}
@media (max-width: 500px){
  .table td, table th{
    font-size:5px;
  }
}
    
    
  </style>
</head>
<body>

<div class="rwd-table">
 
<div class="container">
  <img class="profile-picture" src="placeholder.jpg" alt="Zdjęcie profilowe">

  
<table class="table table-condensed">
  
  <thead>
    <tr>
    <th>Imię</th> <th>Nazwisko</th> <th>Miasto</th> <th>Telefon</th> <th>email</th> 
    </tr>
  </thead>

  <tbody>
<?php
require_once "connect.php";

// Nawiązanie połączenia z bazą danych
$polaczenie = mysqli_connect($host, $db_user, $db_password, $db_name);

// Sprawdzenie połączenia
if (!$polaczenie) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}
// Tutaj możesz wykonywać operacje na bazie danych

echo "<h1 style='color:red;text-align:center;'>Witaj ".$_SESSION['imie_klienta']."</h1>";
	$prof = $_SESSION['imie_klienta'];



// Przykładowe zapytanie SQLtutaajjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj
$sql = "SELECT id_klienta, imie_klienta, nazwisko_klienta, miasto_klienta, telefon_klienta, email_klienta FROM klienci where imie_klienta = '$prof'  ";

// Wykonanie zapytania
$wynik = mysqli_query($polaczenie, $sql);

// Sprawdzenie, czy zapytanie zostało wykonane poprawnie
if (!$wynik) {
    die("Błąd zapytania SQL: " . mysqli_error($polaczenie));
}

$idd=0;
// Przetwarzanie wyników zapytania
while ($_row = mysqli_fetch_assoc($wynik)) {
    // Tutaj możesz wykonywać operacje na danych, na przykład:
    $idd++;
    echo "<tr><td> ". $_row['imie_klienta'] . "</td><td>" . $_row['nazwisko_klienta'] ."</td><td>". $_row["miasto_klienta"]."</td><td>" . $_row['telefon_klienta'] . "</td><td>" . $_row['email_klienta'] . "</td></tr>";
}
// Zamknięcie połączenia
mysqli_close($polaczenie);
?>
</div>
</div>
</body>
</html>