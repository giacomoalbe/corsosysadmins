<?php 

if (isset($_POST['nome'])) {
  echo "Nome: " . $_POST['nome'] . "<br>";
  echo "Cognome: " . $_POST['cognome'] . "<br>";
  echo "Età: " . $_POST['eta'] . "<br>";
  echo "Sistema Operativo: " . $_POST['os'] . "<br>";
  echo "Professione: " . $_POST['professione'] . "<br>";
}

$headers = [
  "Nome", 
  "Cognome", 
  "Età", 
  "Sistema Operativo", 
  "Professione",
  "Bellezza (1..10)"
];

$utenti = [
  ["giacomo", "alberini", 25, "linux", "docente", 12],
  ["paolo", "belli", 30, "winzozz", "mantenuto", 5],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lista Utenti</title>
</head>
<body>
  <h1>Software Gestione Utenti Strafico</h1>
  <a href="aggiungiutente.php">Aggiungi Utente</a>

  <table>
    <thead>
      <tr>
        <?php foreach($headers as $header) { ?>
        <th><?= $header; ?></th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach($utenti as $utente) { ?>
      <tr>
        <?php foreach($headers as $indice => $header) { ?>
        <td><?= $utente[$indice] ?></td>
        <?php } ?>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
