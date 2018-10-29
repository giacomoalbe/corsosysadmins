<?php 
  function salvaUtenti($utenti) {
    // Scrive gli utenti sul file utenti.csv
    $fileHandler = fopen("utenti.csv", "w"); 

    $utentiStr = [];

    foreach($utenti as $utente) {
      $utentiStr[] = implode(",", $utente);
    }

    $fileContent = implode("\r", $utentiStr);

    fwrite($fileHandler, $fileContent);

    fclose($fileHandler);
  }

  function reloadList() {
    // Post Request Get per evitare doppia form submission
    header("Location: index.php");
    exit();
  }

  // 0. Caricare gli utenti 
  $campi = [
    "ID",
    "nome",
    "cognome",
    "eta",
    "sistema operativo",
    "professione",
  ];

  $utenti = [];

  $fileHandler = fopen("utenti.csv", "r");

  while (!feof($fileHandler)) {
    $stringaUtente = fgets($fileHandler);

    if ($stringaUtente != "") {
      $utenti[] = explode(",", $stringaUtente);
    }
  }

  fclose($fileHandler);

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
    }

    reloadList();
  }

  // 2. [Eventualmente] Svolgere operazione
  if (isset($_POST['nome'])) {
    // C'è nuovo utente, aggiungilo!
    $nuovoUtente = [];

    $ID = file_get_contents("ID");

    $ID = $ID == "" ? 1 : $ID;

    $nuovoUtente[] = $ID;
    $nuovoUtente[] = $_POST['nome'];
    $nuovoUtente[] = $_POST['cognome'];
    $nuovoUtente[] = $_POST['eta'];
    $nuovoUtente[] = $_POST['os'];
    $nuovoUtente[] = $_POST['professione'];

    file_put_contents("ID", $ID + 1);

    $nuovoUtenteStringa = implode(",", $nuovoUtente) . "\n";

    $fileHandler = fopen("utenti.csv", "a");

    fwrite($fileHandler, $nuovoUtenteStringa);
    fclose($fileHandler);

    reloadList();
  }
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
