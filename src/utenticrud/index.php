<?php 
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

    // Post Request Get per evitare doppia form submission
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
  }

  echo "ID in ENV: " . getenv("ID")  . "<br>";

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lista Utenti</title>
</head>
<body>
  <h1>Sistema gestione utenti</h1>
  <a href="aggiungiutente.php">Aggiungi Utente</a>
  <table border="1px">
    <thead>
      <tr>
        <?php foreach($campi as $campo) { ?>
        <th><?=$campo?></th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach($utenti as $utente) { ?>
      <tr>
        <?php foreach($campi as $indice => $campo) { ?>
        <td><?= $utente[$indice] ?></td>
        <?php } ?>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
