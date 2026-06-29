<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Portfolio

# Descrizione
Nome repo: laravel-portfolio
Ora inseriamo la nostra prima entità: il Progetto.

# Svolgimento
L'obiettivo di oggi è quello di iniziare a preparare il back-office per poter gestire i progetti nel nostro sito portfolio

- Creiamo il modello Project, con relativa migrazione ed un seeder per inserire inizialmente alcuni progetti nel Database
- Prepariamo un Resource Controller (Admin/ProjectController) incaricato di gestire tutte le operazioni CRUD sui progetti. 
- Soffermiamoci per oggi solo sulla logica delle azioni di index e show. 
- Creiamo le rotte per i nostri progetti e prepariamo un layout per mostrare i nostri progetti in tabella nella rotta index. 
- Inventiamo anche uno stile per la pagina di show, che dovrà mostrare un singolo progetto. 

## Aggiungiamo il Type

# Descrizione
Nome repo: laravel-portfolio
Continuiamo a lavorare sul nostro sito portfolio e aggiungiamo una nuova entità Type. Questa entità rappresenta la tipologia di un progetto ed è in relazione one to many con i progetti.

# Svolgimento
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi: 

- Creiamo il modello Type, con relativa migrazione ed un seeder per inserire i types nel Database
- Creiamo anche la migration per modificare la tabella projects, che dovrà ora contenere la chiave esterna type_id
- Nei modelli Type e Project, aggiungiamo i metodi per definire la relazione one-to-many
- Nella pagina di dettaglio del progetto, mostriamo il Type a cui il progetto appartiene. Volendo, potremmo anche aggiungere una colonna che indica il tipo nella tabella della pagina Index dei progetti.
- Nei form di creazione e modifica dei progetti, dobbiamo permettere di associare un type al progetto stesso. Gestiamo inoltre il salvataggio di questa associazione progetto-tipologia nel controller ProjectController

# Bonus
Aggiungere le operazioni CRUD anche per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.
Nota: per questo esercizio non è previsto un video di correzione giacché le funzionalità richieste sono uguali a quelle mostrate nel modulo. Pertanto le lezioni stesse fungono da guida per la correzione
