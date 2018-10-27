<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Aggiungi Utente</title>
</head>
<body>
  <a href="fileread.php">Indietro</a>
  <form 
    action="azioniutente.php" 
    method="POST">
    <div>
      <label for="input_nome">Nome: </label>
      <input 
          required
          type="text"
          id="input_nome"
          name="nome"
          placeholder="Inserisci il nome dell'utente">
    </div>
    <div>
      <label for="input_cognome">Cognome: </label>
      <input 
          required
          type="text"
          id="input_cognome"
          name="cognome"
          placeholder="Inserisci il cognome dell'utente">
    </div>
    <div>
      <label for="input_eta">Età: </label>
      <input 
          required
          type="number"
          id="input_eta"
          name="eta"
          placeholder="Inserisci l'eta dell'utente">
    </div>
    <div>
      <label for="input_professione">Professione: </label>
      <select 
          id="input_professione" 
          name="professione" 
          required>
        <option value="studente">Studente</option>
        <option value="docente">Docente</option>
        <option value="mantenuto">Mantenuto</option>
      </select>
    </div>
    <div>
      <label for="input_nome">Squadra: </label>
      <input 
          required
          type="text"
          id="input_eta"
          name="squadra"
          placeholder="Inserisci la squadra del cuore dell'utente">
    </div>
    <div>
      <input 
          type="hidden" 
          name="azione" 
          value="aggiungi">
      <input 
          type="submit" 
          value="Crea Utente">
    </div>
  </form>
</body>
</html>
