<?php 
  $azione = "";
  $datiInput = [];
  $testoSuccessoAzione = "";

  $headers = [
    "id",
    "nome", 
    "cognome", 
    "eta", 
    "professione", 
    "squadra"
  ];

  function getUsers() {
    $headers = [
      "id",
      "nome", 
      "cognome", 
      "eta", 
      "professione", 
      "squadra"
    ];

    $userRows = explode("\n", file_get_contents("utenti.csv"));

    $users = [];

    foreach ($userRows as $row) {
      $user = [];

      $userFields = explode(",", $row);

      foreach($headers as $index => $header) {
        $user[$header] = $userFields[$index];
      }

      $users[] = $user;
    }

    return $users;
  }

  function writeUsers($users) {
    $headers = [
      "id",
      "nome", 
      "cognome", 
      "eta", 
      "professione", 
      "squadra"
    ];

    $userRows = [];

    foreach ($users as $user) {
      $userRow = [];

      foreach($user as $key => $value) {
        $userRow[] = $value;
      }

      $userRows[] = implode(",", $userRow);
    }

    file_put_contents("utenti.csv", implode("\n", $userRows));
  }


  if (isset($_POST['azione'])) {
    $azione = $_POST['azione'];
    $datiInput = $_POST;
  }

  if (isset($_GET['azione'])) {
    $azione = $_GET['azione'];
    $datiInput = $_GET;
  }

  if ($azione) {
    switch ($azione) {
      case "aggiungi":
        $newUser = [];

        $fileIdUtente = fopen("ultimo_id_utente", "r");
        $prossimoId = ((int) trim(fgets($fileIdUtente))) + 1;
        fclose($fileIdUtente);

        $fileIdUtente = fopen("ultimo_id_utente", "w");
        fwrite($fileIdUtente, $prossimoId);
        fclose($fileIdUtente);

        echo "ProssimoId: $prossimoId<br>";

        $datiInput["id"] = $prossimoId;

        foreach($headers as $header) {
          $newUser[] = $datiInput[$header];
        }

        $newUserString = implode(",", $newUser) . "\n";

        $fileWriter = fopen("utenti.csv", "a");

        fwrite($fileWriter, $newUserString);

        fclose($fileWriter);

        unset($fileWriter);

        $testoSuccessoAzione = "Utente inserito con successo.";

        break;
      case "cancella":
        $idDaCancellare = trim($datiInput['id']); 

        $testoSuccessoAzione = "Cancella " . $datiInput['id'];

        $users = getUsers();

        foreach($users as $index => $user) {
          if ($user['id'] == $idDaCancellare) {
            unset($users[$index]);
          } 
        }

        writeUsers($users);

        break;
      case "modifica":
        $testoSuccessoAzione = "Modifica " . $datiInput['id'];
        break;
    }
  }  
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
<h3><?= $testoSuccessoAzione ?></h3>
  <a href="fileread.php">Torna alla lista utenti</a>
  <a href="aggiungiutente.php">Aggiunto un nuovo utente</a>
</body>
</html>
