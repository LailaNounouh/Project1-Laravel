GlamConnect — Student Project

GlamConnect is een webapplicatie gebouwd met Laravel voor studenten en docenten. Het platform centraliseert nieuws, FAQ’s, contactberichten en gebruikersprofielen. Daarnaast bevat het een beheerpaneel waar een administrator inhoud kan beheren.

Dit project werd uitgevoerd in het kader van het vak Professional Skills Development.

Installatie

Volg onderstaande stappen om het project lokaal te installeren:

Project klonen
git clone <your-repo-url>
cd Project1-Laravel

PHP dependencies installeren
composer install
cp .env.example .env
php artisan key:generate

Configureer .env

Stel database-instellingen in (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)

Stel mailer in op MAIL_MAILER=log (zodat e-mails gelogd worden in plaats van verzonden)

Frontend dependencies
npm install
npm run dev

Storage link aanmaken
php artisan storage:link

Database migreren en seeders uitvoeren
php artisan migrate
php artisan db:seed

Project starten
php artisan serve

Of gebruik Herd / Valet als je dat hebt.

Admin-login (testaccount)

Voor testdoeleinden is er een standaard administratoraccount:

E-mail: admin@ehb.be

Wachtwoord: Password!321

Met dit account kan je:

Nieuws beheren (CRUD)

FAQ’s beheren

Categorieën aanmaken/bewerken

Contactberichten bekijken

Functionaliteiten
Publieke gebruiker (niet ingelogd)

Nieuws bekijken (lijst + detail)

Zoeken op nieuwsartikelen

FAQ bekijken en filteren per categorie

Contactformulier invullen (berichten worden gelogd)

Ingelogde gebruiker

Eigen profiel bekijken

Profielgegevens aanpassen (naam, e-mail, bio)

Profielfoto uploaden

Reageren op nieuwsartikels (comments)

Administrator

Nieuws CRUD: aanmaken, bewerken, verwijderen

FAQ CRUD: vragen beheren

Categorieën beheren

Contactberichten in adminoverzicht bekijken

Reacties op nieuws beheren

Extra functionaliteiten

Admin-panel voor contactberichten: Admin kan alle ingevulde berichten bekijken en verwijderen

Zoekfunctie op nieuwsartikelen: Bezoekers kunnen zoeken op titel en content

Like-systeem voor nieuwsartikelen (optioneel)

Dashboard met statistieken (bijvoorbeeld aantal gebruikers, aantal berichten, FAQ’s)

Verbeterde UI: buttons met btn-glam, consistente layout, responsive design

Technische details

Framework: Laravel 10

CSS: Tailwind

Authenticatie: Laravel Breeze

Database: MySQL / MariaDB

Uploads: Wordt opgeslagen in storage/app/public

Mailer: Gelogd in storage/logs/laravel.log

Blade-componenten: gebruikt voor herbruikbare UI-elementen

Middleware: authenticatie + admin-check

Relaties: Eloquent relaties, inclusief one-to-many en many-to-many

Gebruikte modules/pagina’s

Profielsysteem: Naam, e-mail, bio en profielfoto; upload functionaliteit voor afbeeldingen

Nieuws: Index, detail, beheer en zoekfunctie; reactiesysteem per artikel

FAQ + categorieën: Filterbaar per categorie; admin kan categorieën en vragen beheren

Contactformulier: Validatie van naam, e-mail en bericht; berichten worden opgeslagen en gelogd

Admin panel: Overzicht van contactberichten; nieuwsbeheer; FAQ- en categoriebeheer

Testhandleiding

Als gast:

Homepagina bezoeken

Nieuws bekijken + zoeken

FAQ bekijken + filteren

Contactformulier invullen

Als gewone gebruiker:

Profiel bewerken

Profielfoto uploaden

Comment plaatsen bij een nieuwsartikel

Als administrator:

Nieuwsberichten aanmaken/bewerken/verwijderen

FAQ’s beheren

Nieuwe categorieën aanmaken

Contactberichten openen en beheren

Extra dashboards en statistieken bekijken

Bronvermelding

Laravel documentation: https://laravel.com/docs

Tailwind CSS documentation: https://tailwindcss.com/docs

Laravel Breeze: https://laravel.com/docs/10.x/starter-kits#breeze
