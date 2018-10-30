<?php 
require "funzioni.php";

$user = [];
$titolo = "Aggiungi";
$modalita = "add";

// 0. Verifico se è presente un ID
if (isset($_GET['ID'])) {
  // 1. Prendo tutti gli utenti
  $userIdDaTrovare = $_GET['ID']; 

  $user = getUser($userIdDaTrovare);

  $titolo = "Modifica";
  $modalita = "edit";
} 

$osOptions = [
  "linux" => "Linux",
  "winzozz" => "Windows",
  "macos" => "MacOS",
  "solaris" => "Solaris",
  "bsd" => "BSD",
];

$professioneOptions = [
  "studente" => "Studente", 
  "docente" => "Docente", 
  "sistemista" => "Sistemista", 
  "programmatore" => "Programmatore", 
  "manutenuto" => "Mantenuto", 
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?=$titolo?> Utente</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <a href="index.php">Torna alla lista</a>
  <h1><?=$titolo?> Utente</h1>
  <form 
    action="index.php?mode=<?=$modalita?>"
    method="POST">
    <div>
      <label for="input_nome">Nome: </label>
      <input 
        required
        value="<?=$user[1]?>"
        name="nome"
        id="input_nome"
        placeholder="Inserisci il nome"
        type="text">
    </div>
    <div>
      <label for="input_cognome">Cognome: </label>
      <input 
        required
        name="cognome"
        value="<?=$user[2]?>"
        id="input_cognome"
        placeholder="Inserisci il cognome"
        type="text">
    </div>
    <div>
      <label for="input_eta">Eta: </label>
      <input 
        required
        name="eta"
        value="<?=trim($user[3])?>"
        id="input_eta"
        placeholder="Inserisci l'età"
        type="number">
    </div>
    <div>
      <label for="input_os">Sistema Operativo: </label>
      <select 
        id="input_os" 
        name="os"
        required>
        <?php foreach($osOptions as $value => $display) { ?>
        <option 
            value="<?=$value?>" 
            <?php if (trim($user[4]) == $value) echo 'selected' ?>>
            <?=$display?>
        </option>
        <?php } ?>
      </select>
    </div>
    <div>
      <label for="input_professione">Professione: </label>
      <select 
        id="input_professione" 
        name="professione"
        required>
        <?php foreach($professioneOptions as $value => $display) { ?>
        <option 
          value="<?=$value?>" 
          <?php if (trim($user[5]) == $value) echo 'selected'?>>
          <?=$display?>
        </option>
        <?php } ?>
      </select>
    </div>
    <div>
    <input type="hidden" name="ID" value="<?=$user[0]?>">
    <input type="submit" value="<?=$titolo?> Utente">
    </div>
  </form>
</body>
</html>
