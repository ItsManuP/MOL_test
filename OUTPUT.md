# Prova tecnica SOStariffe - Output
Rispondere alle seguenti domande:

1. Quali comandi è necessario eseguire per vedere il progetto in azione su un browser?
Utilizzo di Apache tramite Xampp per avviare il server locale e visualizzare la parte relativa a php, la cartella va posizionata nella directory xampp-> htdocs e bisogna connettersi a localhost/prova/
nel caso in cui "prova" sia il nome della cartella contenente i files. 

2. Cosa vuoi mettere in risalto del tuo operato?
Ho svolto il progetto in due giorni, vorrei che si prendesse in considerazione la logica piuttosto che la grafica, in quanto su di essa non ho investito il mio tempo.
Ho utilizzato jquery/ajax per la manipolazione html e gestione degli eventi, nonchè per le comunicazione post con php per la manipolazione ed estrapolazione dati del relativo file json.
Il sito permette di visualizzare i prodotti, archiviare i prodotti(non l'ho intesa come se archiviato lo nascondo dalla lista prodotti principale, bensi come una lista a parte che permette di fare una selezione di quelli che si vedono e salvarli separatamente), come da richieste è possibile modificare un prodotto, aggiungere un prodotto ed filtrare i prodotti per le varie categorie esplicitate nel file readme; infine è possibile visualizzare la lista dei prodotti in ordine crescente/decrescente, nelle quali, in entrambi i casi i prodotti se presente sconto vengono mostrati con il prezzo finale.
Bug presenti risolvibili-> 
Nella lista archiviati può essere aggiunto più volte lo stesso prodotto(soluzione: basta effettuare un controllo anticipato sull'array e verificare che esso non sia già presente controllando per esempio il modello, in quel caso non si aggiunge altrimenti si)
Nonostante il required si può modificare un prodotto anche se non vengono completati interamente i campi(soluzione: effettuare il controllo nella funzione ajax, se non sono presenti tutti i valori, non si effettua la chiamata in post al relativo php e si stampa un relativo div sotto il form della compilazione esempio:"tutti i campi non sono stati compilati")
Alcune volte il dropdown menu non viene aggiornato e come brand rimane quello precedente nonostante il json sia aggiornato.
Il campo input di price accetta solo numeri e non text, questo però comporta che accetta interi ma non decimali. 15 o 16 viene accettato, 
15.99 no. Quando inizialmente avevo posto il type text accettava qualsiasi tipo di numero, che veniva gestito come una stringa e convertito successivamente nel file php.(Soluzione: creare una funzione che tramite una regex(di soli numeri) controlla che il contenuto di input text sia non testo bensi numeri, nel caso in cui la regex è rispettata si effettua la chiamata in post)