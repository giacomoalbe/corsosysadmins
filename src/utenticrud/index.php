<?php 
require "funzioni.php";

$campi = [
  "ID",
  "nome",
  "cognome",
  "eta",
  "sistema operativo",
  "professione",
];

// 1. Valutare la modalità
if (isset($_GET['mode'])) {
  switch ($_GET['mode']) {
    case 'canc':
      $idDaCancellare = $_GET['ID']; 

      foreach($utenti as $indice => $utente) {
        if ($utente[0] == $idDaCancellare) {
          //scancella l'emento ke a indice $indice dendro $utenti.
          unset($utenti[$indice]);
          break;
        }
      }

      salvaUtenti($utenti);

      break;
    case 'edit':
      // Per l'edit serve un ID 
      // e i nuovi dati dell'utente
      $idToEdit = $_POST['ID'];

      $userToEdit = getUser($idToEdit);

      $userToEdit[1] = trim($_POST['nome']);
      $userToEdit[2] = trim($_POST['cognome']);
      $userToEdit[3] = trim($_POST['eta']);
      $userToEdit[4] = trim($_POST['os']);
      $userToEdit[5] = trim($_POST['professione']);

      saveUser($idToEdit, $userToEdit);

      break;
    case 'add':
      // C'è nuovo utente, aggiungilo!
      $nuovoUtente = [];

      $ID = file_get_contents("ID");

      $ID = $ID == "" ? 1 : $ID;

      $nuovoUtente[] = $ID;
      $nuovoUtente[] = trim($_POST['nome']);
      $nuovoUtente[] = trim($_POST['cognome']);
      $nuovoUtente[] = trim($_POST['eta']);
      $nuovoUtente[] = trim($_POST['os']);
      $nuovoUtente[] = trim($_POST['professione']);

      file_put_contents("ID", $ID + 1);

      $nuovoUtenteStringa = implode(",", $nuovoUtente) . "\n";

      $fileHandler = fopen("utenti.csv", "a");

      fwrite($fileHandler, $nuovoUtenteStringa);
      fclose($fileHandler);

      break;
  }

  reloadList();
}

// 0. Caricare gli utenti 
$utenti = getUsers(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lista Utenti</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Sistema gestione utenti</h1>
  <a class="green" href="aggiungiutente.php">Aggiungi Utente</a>
  <table>
    <thead>
      <tr>
        <?php foreach($campi as $campo) { ?>
        <th><?=$campo?></th>
        <?php } ?>
        <th>Azioni</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($utenti as $utente) { ?>
      <tr>
        <?php foreach($campi as $indice => $campo) { ?>
        <td><?= $utente[$indice] ?></td>
        <?php } ?>
        <td>
          <a 
          class="red"
          href="index.php?mode=canc&ID=<?=$utente[0]?>">
            Cancella
          </a> 
          <a 
          class="orange"
          href="aggiungiutente.php?ID=<?=$utente[0]?>">
            Modifica
          </a> 
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
