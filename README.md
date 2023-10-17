# MOL_test

# Comparatore di orologi - SOStariffe.it

SOStariffe.it vuole aggiungere sul suo sito internet un comparatore di orologi.
Il team di sviluppo è quindi incaricato di sviluppare un pannello di amministrazione dove poter inserire,
modificare e archiviare i prodotti e una pagina che sarà inserita nel sito dove sarà possibile confrontare
gli orologi. I sistemisti chiedono al team di sviluppo di ridurre al minimo il numero di richieste al 
server. A te è comissionato lo sviluppo del pannello di amministrazione.

## Specifica della prova
Si costruisca una pagina web dove gli amministratori possano gestire i prodotti. Non è obbligatorio implementare
un sistema di autenticazione. Le operazioni possibili devono essere le seguenti:  

- visualizzare i prodotti
- aggiungere un prodotto
- modificare un prodotto
- archiviare un prodotto

Inoltre, per facilitare la visualizzazione dei prodotti agli amministratori, deve essere possibile 
filtrare l'elenco degli orologi per:  

- brand
- sconto: SI/NO
- fascia di prezzo: 40-80, 80-120, 120-160

Inoltre, l'amministratore deve poter ordinare la lista degli orologi per prezzo (comprensivo di sconto) 
crescente/decrescente

## Regole
- devono essere utilizzati i prodotti elencati nel file `db-watches.json`
- la prova dovrà essere sviluppata in PHP e con una o più delle seguenti tecnologie: Javascript, Typescript, NodeJS
- non è consentito l'utilizzo di Framework (né Backend né Frontend)

Tutto ciò che non è espressamente specificato è interpretabile liberamente.

## Consigli
Lo scopo della prova è verificare le competenze minime necessarie per lavorare ogni giorno nel nostro team,
a tal proposito si consiglia di:  

- non concentrarsi troppo sulla grafica, non cerchiamo un designer :)
- non utilizzare un database SQL o NoSQL, è sufficiente utilizzare il json fornito o un qualsiasi altro file come database
- sfruttare i plus: se conosci git o i test automatici, usali

## Output della prova
Il risultato della prova dovrà essere un file compresso con all'interno il progetto e il file OUTPUT.md compilato.
