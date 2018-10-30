# Corso SysAdmin

## Parte Programmazione

Questo repository contiene tutto il codice e i materiali didattici utilizzati nella parte di programmazione del corso.

In particolare, ci si è concentrati sulla creazione di un semplice sito per la creazione e gestiona permanente di alcuni utenti, con la possibilità di creare, modificare ed eliminare gli utenti dalla lista. 

L'architettura del sistema si basa su Docker, utilizza Nginx e PHP per la parte di server e sfrutta un database custom rudimentale per lo storage dei dati.
Una seconda versione si connetterà direttamente ad un database relazione MySQL attraverso una classe di gestione. 

## Installazione e Uso

Per utilizzare il servizio sarà necessario far partire il demone docker, recarsi nella cartella principale e digitare il seguente comando:

`
    docker-compose up -d
`

A quel punto sarà sufficiente aprire un browser web digitando l'indirizzo della propria macchina docker e il percorso del file relativo alla cartella `src`, dove sono contenuto i sorgenti delle varie app. 

Per scaricare questo Repository, si può utilizzare direttamente `git` oppure scaricare l'intera cartella come file zip e posizionarla a piacere sul proprio sistema. 

Usando `git` basta posizionarsi nella cartella in cui si desidera scaricare il progetto e digitare il seguente comando:

`
    git clone https://github.com/giacomoalbe/corsosysadmins.git
`

Per poter permettere la lettura e scrittura di tutti i file sia da Nginx (web server) che da PHP, è necessario digitare il seguente comando nella cartella principale:

`
    chmod 777 -R .
`

