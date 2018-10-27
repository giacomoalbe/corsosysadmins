<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Aggiungi Utente</title>
</head>
<body>
  <h1>Aggiungi Utente</h1>
  <form 
    action="index.php" 
    method="POST">
    <div>
      <label for="input_nome">Nome: </label>
      <input 
        required
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
        id="input_cognome"
        placeholder="Inserisci il cognome"
        type="text">
    </div>
    <div>
      <label for="input_eta">Eta: </label>
      <input 
        required
        name="eta"
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
        <option value="linux">Linux</option>
        <option value="macos">MacOs</option>
        <option value="winzozz">Winzozz</option>
        <option value="solaris">Solaris</option>
        <option value="bsd">BSD</option>
      </select>
    </div>
    <div>
      <label for="input_professione">Professione: </label>
      <select 
        id="input_professione" 
        name="professione"
        required>
        <option value="studente">Studente</option>
        <option value="docente">Docente</option>
        <option value="sistemista">Sistemista</option>
        <option value="programmatore">Programmatore</option>
        <option value="mantenuto">Mantenuto</option>
      </select>
    </div>
    <div>
      <input type="submit" value="Aggiungi Utente">
    </div>
  </form>
</body>
</html>
