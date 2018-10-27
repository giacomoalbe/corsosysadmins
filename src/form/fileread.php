<?php 
  $fileReader = fopen("utenti.csv", "r");

  $lines = [];

  while (!feof($fileReader)) {
    $lines[] = fgets($fileReader);
  }

  fclose($fileReader);

  $headers = [
    "id",
    "nome", 
    "cognome", 
    "eta", 
    "professione", 
    "squadra"
  ];

  $users = [];

  foreach($lines as $line) {
    $user = [];

    if ($line == "") {
      continue;
    }

    $userFields = explode(",", $line);

    foreach ($headers as $index => $header) {
      $user[$header] = $userFields[$index];
    }

    $users[] = $user;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lista Utenti</title>
</head>
<body>
  <a href="aggiungiutente.php">Aggiunti Utente</a>
  <table>
    <tr>
      <?php foreach($headers as $header) { ?>
      <th><?= $header ?></th>
      <?php } ?>
      <th>Azioni</th>
    </tr>
    <?php foreach($users as $user) { ?>
    <tr>
      <?php foreach($headers as $header) { ?>
      <td><?= $user[$header] ?></td>
      <?php } ?>
      <td>
        <a href="azioniutente.php?azione=cancella&id=<?=$user["id"]?>">Cancella</a>
        <a href="aggiungiutente.php?id=<?=$user["id"]?>">Modifica</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
