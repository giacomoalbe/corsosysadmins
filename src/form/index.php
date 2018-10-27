<?php
  $nome = isset($_POST['nome']) 
          ? $_POST['nome'] 
          : "Mondo";

  $eta = isset($_POST['eta']) 
          ? $_POST['eta'] 
          : -1;
?>

<html>
  <head>
    <title>Titolo bello della Pagina</title>
  </head>
  <body>
    <h1>Ciao, <?= $nome; ?>!</h1>

    <?php if ($eta > -1) { ?>
    <h2>Hai, <?= $eta ?> anni!</h2>
    <?php } ?>

    <form 
        method="POST"
        action="index.php">
      <div>
        <label for="input_nome">Nome: </label>
        <input 
          required
          id="input_nome"
          type="text" 
          name="nome" 
          placeholder="Inserisci il tuo nome"/>
      </div>
      <div>
        <label for="input_eta">Eta: </label>
        <input 
          required
          id="input_eta"
          type="number" 
          name="eta" 
          placeholder="Inserisci la tua età"/>
      </div>
      <div>
        <input 
          type="submit" 
          value="Invia, diamine!">
      </div>
    </form>
    <a href="fileread.php">Vai a lista utenti</a>
  </body>
</html>
