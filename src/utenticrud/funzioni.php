<?php
function connect() {
  // Si connette al database
  // TODO: controllare che si connetta al DB
  return new mysqli("db", "test", "test", "test");
} 

function getProfessioni() {
  $db = connect();

  $sqlGetAllProfessioni = "SELECT 
      id, descrizione 
    FROM professioni";

  $resultAllProfessioni = $db->query($sqlGetAllProfessioni);

  // TODO: check errors :)

  return $resultAllProfessioni->fetch_all();
}

function getSistemiOperativi() {
  $db = connect();

  $sqlGetAllProfessioni = "SELECT 
      id, descrizione 
    FROM os";

  $resultAllProfessioni = $db->query($sqlGetAllProfessioni);

  // TODO: check errors :)

  return $resultAllProfessioni->fetch_all();
}

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
  // 0. Connettersi al DB
  $db = connect(); 

  // 1. Selezionare tutti utenti
  $sqlGetAllUtenti = "
      SELECT 
        utenti.id,
        nome,
        cognome,
        eta,
        os.codice,
        professioni.codice
      FROM 
        utenti,
        professioni,
        os 
      WHERE 
        utenti.professione_id = professioni.id 
        AND utenti.os_id = os.id";

  $resultAllUsers = $db->query($sqlGetAllUtenti);

  //$utenti = $resultAllUsers->fetch_all();

  while ($data = $resultAllUsers->fetch_row()) {
    $utenti[] = $data;
  }

  // 2. Restituire utenti alla pagina
  return $utenti;
}

function addUser($userArray) {
  $utenti = getUsers();

  $utenti[] = $userArray;

  salvaUtenti($utenti);
}

function salvaUtenti($utenti) {
  // Scrive gli utenti sul file utenti.csv
  $fileHandler = fopen("utenti.csv", "w"); 

  $utentiStr = [];

  foreach($utenti as $utente) {
    $utentiStr[] = implode(",", $utente);
  }

  $fileContent = implode(";", $utentiStr);

  fwrite($fileHandler, $fileContent);

  fclose($fileHandler);
}

function reloadList() {
  // Post Request Get per evitare doppia form submission
  header("Location: index.php");
  exit();
}
?>
