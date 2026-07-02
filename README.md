<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img
            src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
            width="400"
            alt="Laravel Logo"
        >
    </a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions">
        <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

# Laravel Portfolio

Applicazione web sviluppata con **Laravel** per la creazione e la gestione di un portfolio personale.

Il progetto comprende un'area pubblica dedicata alla visualizzazione dei lavori realizzati e un pannello di amministrazione protetto da autenticazione, attraverso il quale è possibile gestire progetti, tipologie e tecnologie.

Il repository viene aggiornato progressivamente durante il corso, aggiungendo nuove funzionalità e migliorando l'organizzazione dell'applicazione.

## Funzionalità principali

- Autenticazione tramite Laravel Breeze
- Area di amministrazione riservata
- Gestione completa dei progetti
- Gestione delle tipologie di progetto
- Gestione delle tecnologie utilizzate
- Relazioni tra progetti, tipologie e tecnologie
- Validazione dei dati inseriti
- Conferma prima dell'eliminazione
- Interfaccia realizzata con Bootstrap

## Tecnologie utilizzate

- PHP
- Laravel
- Eloquent ORM
- Laravel Breeze
- Blade
- MySQL
- Bootstrap
- Vite
- Composer
- npm

## Struttura dei dati

L'applicazione utilizza tre entità principali:

### Project

Rappresenta un progetto presente nel portfolio.

Ogni progetto può:

- appartenere a una tipologia;
- utilizzare una o più tecnologie.

### Type

Rappresenta la categoria o la tipologia di un progetto, ad esempio:

- Web Design
- Graphic Design
- Front End
- Back End
- Full Stack

La relazione tra `Type` e `Project` è di tipo **one-to-many**:

- una tipologia può essere associata a più progetti;
- ogni progetto può appartenere a una sola tipologia.

### Technology

Rappresenta una tecnologia o un linguaggio utilizzato per sviluppare un progetto, ad esempio:

- HTML
- CSS
- JavaScript
- PHP
- Laravel
- Bootstrap

La relazione tra `Technology` e `Project` è di tipo **many-to-many**:

- un progetto può utilizzare più tecnologie;
- una tecnologia può essere utilizzata in più progetti.

La relazione viene gestita attraverso la tabella pivot `project_technology`.

---

# Sviluppo del progetto

## 1. Configurazione iniziale

La prima fase del progetto è dedicata alla configurazione dell'applicazione Laravel e alla preparazione dell'area di amministrazione.

### Obiettivi

- Installare Laravel
- Installare Laravel Breeze
- Installare e configurare Bootstrap
- Verificare il corretto funzionamento dell'autenticazione
- Creare un layout dedicato all'area amministrativa

---

## 2. CRUD dei progetti — Parte 1

In questa fase viene introdotta la prima entità dell'applicazione: `Project`.

L'obiettivo è iniziare a costruire il back-office attraverso il quale sarà possibile gestire i progetti presenti nel portfolio.

### Attività

- Creazione del modello `Project`
- Creazione della migration relativa alla tabella `projects`
- Creazione di un seeder per inserire alcuni progetti iniziali nel database
- Creazione del Resource Controller `Admin/ProjectController`
- Implementazione dell'azione `index`
- Implementazione dell'azione `show`
- Creazione delle rotte dedicate ai progetti
- Creazione della pagina contenente la tabella dei progetti
- Creazione della pagina di dettaglio di un singolo progetto

---

## 3. CRUD dei progetti — Parte 2

In questa fase vengono completate tutte le operazioni CRUD relative ai progetti.

L'utente autenticato può creare nuovi progetti, modificare quelli esistenti ed eliminarli.

### Attività

- Implementazione dell'azione `create`
- Implementazione dell'azione `store`
- Implementazione dell'azione `edit`
- Implementazione dell'azione `update`
- Implementazione dell'azione `destroy`
- Creazione del form per l'inserimento di un progetto
- Creazione del form per la modifica di un progetto
- Validazione dei dati inviati
- Inserimento dei pulsanti di visualizzazione, modifica ed eliminazione nella pagina `index`
- Inserimento di un pulsante per accedere alla pagina di creazione
- Visualizzazione della tipologia nella pagina di dettaglio del progetto

### Funzionalità bonus

Prima di eliminare un progetto, viene richiesta una conferma all'utente.

- La conferma può essere gestita tramite un modale Bootstrap
- Creazione di un Component per il modale in modo da utilizzarlo per ogni elemento da eliminare (progetto, tipologia o tecnologia)

---

## 4. Gestione delle tipologie

In questa fase viene aggiunta l'entità `Type`, utilizzata per classificare i progetti.

### Attività

- Creazione del modello `Type`
- Creazione della migration relativa alla tabella `types`
- Creazione di un seeder per popolare la tabella
- Creazione di una migration per aggiungere `type_id` alla tabella `projects`
- Definizione della relazione one-to-many nei modelli `Type` e `Project`
- Visualizzazione della tipologia nella pagina di dettaglio del progetto
- Inserimento della selezione della tipologia nei form di creazione e modifica
- Gestione del salvataggio della relazione nel `ProjectController`

### Funzionalità bonus

- Implementazione delle operazioni CRUD per il modello `Type`, in modo da gestire le tipologie direttamente dal pannello di amministrazione.
- Creazione di un filtro progetti per tipologia nella tabella dei progetti per visualizzare solo quelli appartenenti alla tipologia

---

## 5. Gestione delle tecnologie

In questa fase viene aggiunta l'entità `Technology`, che rappresenta i linguaggi, i framework e gli strumenti utilizzati nei diversi progetti.

### Attività

- Creazione del modello `Technology`
- Creazione della migration relativa alla tabella `technologies`
- Creazione di un seeder per popolare la tabella
- Creazione della tabella pivot `project_technology`
- Definizione della relazione many-to-many nei modelli `Technology` e `Project`
- Inserimento della selezione multipla delle tecnologie nei form di creazione e modifica
- Gestione delle associazioni nel `ProjectController`
- Visualizzazione delle tecnologie nella pagina di dettaglio del progetto

Per gestire correttamente le associazioni tra progetti e tecnologie vengono utilizzati i metodi Eloquent dedicati, come:

- `attach()`
- `detach()`
- `sync()`

### Funzionalità bonus

- Implementazione delle operazioni CRUD per il modello `Technology`
- Gestione delle tecnologie direttamente dal pannello di amministrazione
- Creazione automatica delle associazioni tra progetti e tecnologie tramite i seeder

---

## 6. Esposizione delle API

Come ultimo passaggio del progetto vengono realizzate delle API per rendere disponibili all'esterno i dati relativi ai progetti.

L'obiettivo è permettere a un'applicazione frontend separata di collegarsi al backend Laravel e ricevere le informazioni sui progetti in formato JSON.

### Attività

- Creazione del file delle rotte API con il comando: *php artisan install:api*
- Creazione di un controller dedicato alle API: *php artisan make:controller Api/ProjectController*
- Creazione delle rotte nel file routes/api.php
- Implementazione di un metodo index per restituire l'elenco dei progetti con tipologia
- Implementazione di un metodo show per restituire i dati di un singolo progetto con tipologia e tecnologie
- Restituzione dei dati in formato JSON
- Test delle API tramite Postman
- (Configurazione delle regole CORS nel file cors.php per autorizzare le applicazioni esterne a effettuare richieste al backend Laravel)

### Endpoint previsti:

| Metodo | Endpoint | Descrizione |
| --- | --- | --- |
| GET | `/api/projects` | Restituisce l'elenco dei progetti |
| GET | `/api/projects/{project}` | Restituisce il dettaglio di un singolo progetto |

Le risposte vengono restituite in formato JSON e possono includere anche le relazioni associate al progetto, come la tipologia e le tecnologie utilizzate.

## Progetto bonus: frontend React

Come estensione del progetto viene realizzata, in un repository separato chiamato laravel-portfolio-bonus, una piccola applicazione frontend sviluppata con React.
Il frontend React comunica con il backend Laravel tramite richieste HTTP alle API create nel progetto principale.

L'applicazione permette anche agli utenti non autenticati di:

- visualizzare nella Home l'elenco dei progetti;
- accedere alla pagina di dettaglio di un singolo progetto;
- recuperare i dati attraverso le API Laravel;
- visualizzare la tipologia e le tecnologie associate a ogni progetto.


# Operazioni CRUD

Il pannello di amministrazione permette di eseguire le seguenti operazioni:

| Operazione | Descrizione |
| --- | --- |
| Create | Creazione di un nuovo elemento |
| Read | Visualizzazione dell'elenco e dei dettagli |
| Update | Modifica di un elemento esistente |
| Delete | Eliminazione di un elemento |

---


# Stato del progetto

Il progetto è in fase di sviluppo e viene aggiornato progressivamente con nuove funzionalità.

# Autore

Progetto realizzato da **Denis Filippini** come esercitazione su Laravel, l'architettura MVC, Eloquent ORM e la gestione delle relazioni tra modelli.

---

# Licenza

Il progetto è stato realizzato a scopo didattico.
