<?php 
  $nome = "Giacomo";
  $cognome = "Alberini";

  echo "<h1>" . $nome . "</h1>";
  echo "<h1>$nome</h1>";

  $intero = 10;
  $float = 0;
  $true = true;
  $false = false;

  // AND Logico && oppure and
  // OR  Logico || oppure or
  // NOT Logico !  oppure not

  $eta = 17;
  $nome = "Paolino";
  $cognome = "Paperino";
  $gender = "m";

  function controllaEta($etaParametro) {
    if ($etaParametro >= 18) {
      return true;
    } else {
      return false;
    }
  }

  $array = [1,2,"ciao",4,5,6,7];

  $array = [
    0 => 1,
    1 => 2,
    2 => "ciao",
  ];

  $assArray = [
    "nome" => "Giacomo",
    "cognome" => "Alberini",
    "eta" => 19,
    "gender" => "m"
  ];

  $arrayMultiEtnico = [
    10, 3, 5, 6, 10,
    1.5, 1.6, 2.5, 10.6, 
    "ciao", "bello", " ", "ciao"
  ];

  $risultati = [
    "interi" => 0,
    "double" => 0.0,
    "stringhe" => ""
  ];

  for ($i = 0; $i < count($arrayMultiEtnico); $i++) {
    $elemento = $arrayMultiEtnico[$i]; 

    switch (gettype($elemento)) {
      case "integer":
        $risultati["interi"] += $elemento;
        break;
      case "double":
        $risultati["double"] += $elemento;
        break;
      case "string":
        $risultati["stringhe"] .= $elemento;
        break;
    }
  }

  echo "Risultati: <br>";

  foreach ($risultati as $tipo => $risultato) {
    echo "$tipo: $risultato<br>";
  }
?>
