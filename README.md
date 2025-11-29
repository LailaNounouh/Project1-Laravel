# GlamConnect — Student Project

**GlamConnect** is een Laravel webapplicatie ontwikkeld door studenten om full-stack vaardigheden te oefenen. Het platform centraliseert nieuws, FAQ’s, contactberichten en gebruikersprofielen. Daarnaast bevat het een admin panel waar een administrator inhoud kan beheren.  

Uitgevoerd in het kader van het vak **Professional Skills Development**.

---

##  Quick Start (Lokaal draaien)

1. **Project klonen**
```bash
git clone <your-repo-url>
cd glamconnect
PHP dependencies installeren

bash
Copier le code
composer install
.env bestand instellen

bash
Copier le code
cp .env.example .env
Pas database-instellingen aan op basis van je lokale omgeving.

Frontend dependencies installeren

bash
Copier le code
npm install
npm run dev
Gebruik npm run build voor productie.

Storage koppelen

bash
Copier le code
php artisan storage:link
Database migreren en seeders uitvoeren

bash
Copier le code
php artisan migrate --seed
Project starten

bash
Copier le code
php artisan serve
Of gebruik Herd/Valet als je dat hebt.

 Admin Login
Voor testdoeleinden bestaat er een admin-account:

E-mail: admin@ehb.be

Wachtwoord: Password!321

Met dit account kan je nieuws, FAQ’s, categorieën en contactberichten beheren.

 Functionaliteiten
Voor gastgebruikers
Nieuwsberichten bekijken

Zoeken op nieuwsartikels

FAQ bekijken en filteren op categorie

Contactformulier invullen (berichten worden gelogd)

Registreren en inloggen

Ingelogde gebruiker
Eigen profiel bekijken en aanpassen (naam, e-mail, bio)

Profielfoto uploaden

Reageren op nieuwsartikels (comments)

Administrator
Nieuws CRUD (aanmaken, bewerken, verwijderen)

FAQ CRUD en categoriebeheer

Contactberichten bekijken en verwijderen

Beheer van gebruikersreacties op nieuwsartikels

 Technische details
Framework: Laravel 10

CSS: Tailwind

Authenticatie: Laravel Breeze

Database: MySQL / MariaDB

Uploads: storage/app/public

Mailer: ingesteld op log (storage/logs/laravel.log)

Blade-componenten: herbruikbare UI-elementen

Middleware: authenticatie + admin-check

Comments: relaties via Eloquent (User ↔ Comments ↔ News)

 Modules en Pagina’s
Profiel
Naam, e-mail, bio en profielfoto

Upload functionaliteit

Validatie en opslag in public disk

Nieuws
Index, detail en beheer

Zoekfunctionaliteit

Comment systeem per artikel

FAQ + categorieën
Filterbaar per categorie

Admin kan categorieën en vragen beheren

Contactformulier
Naam, e-mail en bericht validatie

Berichten opgeslagen in database

Gelogd via Laravel mailer

Admin Panel
Overzicht van alle contactberichten

FAQ beheer

Nieuwsbeheer

Categoriebeheer

 Handleiding testen
Als gast
Homepagina bezoeken

Nieuws bekijken en zoeken

FAQ bekijken en filteren

Contactformulier invullen

Als gewone gebruiker
Profiel bewerken + profielfoto uploaden

Comment plaatsen bij nieuwsartikels

Als administrator
Nieuwsartikels aanmaken en beheren

FAQ’s beheren

Nieuwe categorie aanmaken

Contactberichten bekijken/verwijderen

 Projectstatus
Alle verplichte onderdelen zijn geïmplementeerd. Extra functionaliteiten zoals comments en zoekfunctionaliteit zijn toegevoegd voor extra interactie en gebruiksvriendelijkheid.
