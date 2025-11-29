GlamConnect

GlamConnect is een webapplicatie gebouwd in Laravel voor studenten en docenten. Het platform centraliseert nieuws, FAQ’s, contactberichten en gebruikersprofielen. Daarnaast bevat het een beheerpaneel waar een administrator inhoud kan beheren.

Dit project werd uitgevoerd in het kader van het vak Professional Skills Development.

Installatie

Volg onderstaande stappen om het project lokaal te installeren.

1. Project klonen
git clone <repository-url>
cd glamconnect

2. Dependencies installeren
composer install
npm install
npm run build

3. .env bestand instellen

Kopieer het voorbeeldbestand:

cp .env.example .env


Stel vervolgens de database-instellingen in op basis van je lokale omgeving.

4. Database migreren en seeders uitvoeren
php artisan migrate --seed

5. Storage koppelen
php artisan storage:link

6. Project starten

Indien je Herd gebruikt, opent het project automatisch.
Anders:

php artisan serve

Inloggen als admin

Voor testdoeleinden bestaat er een administratoraccount:

E-mail: admin@ehb.be

Wachtwoord: Password!321

Met dit account kan je nieuws beheren, FAQ's beheren, categorieën aanmaken en contactberichten bekijken.

Functionaliteiten
Publieke gebruiker (niet ingelogd)

Nieuwsberichten bekijken

Zoeken op nieuwsartikel (indien ingeschakeld)

FAQ-sectie bekijken

Filteren op FAQ-categorie

Contactformulier gebruiken
(berichten worden gelogd via de Laravel mailer)

Registreren en inloggen

Ingelogde gebruiker

Eigen profiel bekijken

Profielgegevens aanpassen (naam, e-mail, bio)

Profielfoto uploaden

Reageren op nieuwsartikels (comments)

Administrator

Nieuws CRUD: aanmaken, bewerken, verwijderen

FAQ CRUD: vragen beheren

Categorieën beheren

Contactberichten in een adminoverzicht bekijken

Reageren op contactberichten (optioneel)

Beheer van gebruikersreacties op nieuws

Technische details

Framework: Laravel 10

CSS: Tailwind

Authenticatie: Laravel Breeze

Database: MySQL / MariaDB

Uploads: Wordt opgeslagen in storage/app/public

Mailer: Ingesteld op log, zodat berichten in storage/logs/laravel.log terechtkomen

Blade-componenten: gebruikt voor herbruikbare UI-elementen

Middleware: authenticatie + admin-check

Comments: relaties via Eloquent (User ↔ Comments ↔ News)

Gebruikte modules en pagina’s
1. Profielsysteem

Profielpagina met naam, e-mail, bio en profielfoto

Upload functionaliteit voor afbeeldingen

Validatie en opslag in public disk

2. Nieuws

Index, detail, beheer en zoekfunctie

Reactiesysteem per artikel

3. FAQ + categorieën

FAQ filterbaar per categorie

Admin kan categorieën en vragen beheren

4. Contactformulier

Validatie van naam, e-mail en bericht

Berichten worden opgeslagen in de database

Een kopie wordt gelogd via de Laravel mailer

5. Admin panel

Overzicht van alle contactberichten

FAQ beheer

Nieuwsbeheer

Categoriebeheer

Handleiding testen
Als gast

Homepagina bezoeken

Nieuws bekijken + zoeken

FAQ bekijken + filter

Contactformulier invullen

Als gewone gebruiker

Profiel bewerken

Profielfoto uploaden

Comment plaatsen bij een nieuwsartikel

Als administrator

Nieuwe nieuwsartikels aanmaken

FAQ’s beheren

Nieuwe categorie aanmaken

Contactberichten openen

Projectstatus

Alle verplichte onderdelen van het project zijn geïmplementeerd.
Extra functionaliteiten zoals comments, zoekfunctie en admin contactoverzicht zijn toegevoegd om de site gebruiksvriendelijker te maken.
