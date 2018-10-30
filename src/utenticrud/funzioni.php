<?php
function getUser($userId) {
  $utenti = getUsers();

  $returnUser = [];

  foreach($utenti as $utente) {
    if ($utente[0] == $userId) {
      $returnUser = $utente; 
      break;
    }
  }

  return $returnUser;
}

function saveUser($userId, $userArray) {
  // 0. Prendere tutti gli utenti
  $utenti = getUsers();

  foreach($utenti as $indice => $utente) {
    if ($utente[0] == $userId) {
      // Al posto dei vecchi dati dell'utente, 
      // mettiamo quelli freschi che ci ha mandato
      // la form
      $utenti[$indice] = $userArray;
    }
  }

  // Ora scriviamo sul file la lista degli 
  // utenti, con $userId modificato
  salvaUtenti($utenti);
}

function printUser($userArray) {
  echo var_dump($userArray);
}

function getUsers() {
  $utenti = [];

  $fileHandler = fopen("utenti.csv", "r");

  while (!feof($fileHandler)) {
    $stringaUtente = fgets($fileHandler);

    if ($stringaUtente != "") {
      $utenti[] = explode(",", $stringaUtente);
    }
  }

  fclose($fileHandler);

  return $utenti;
}

function salvaUtenti($utenti) {
  // Scrive gli utenti sul file utenti.csv
  $fileHandler = fopen("utenti.csv", "w"); 

  $utentiStr = [];

  foreach($utenti as $utente) {
    $utentiStr[] = implode(",", $utente);
  }

  $fileContent = implode(PHP_EOL, $utentiStr);

  fwrite($fileHandler, $fileContent);

  fclose($fileHandler);
}

function reloadList() {
  // Post Request Get per evitare doppia form submission
  header("Location: index.php");
  exit();
}
?>
