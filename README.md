GlamNet — Student Project

GlamNet is een dynamische webapplicatie gebouwd met Laravel om studenten en docenten een centrale plek te bieden voor nieuws, FAQ’s, contactberichten en gebruikersprofielen. Het platform bevat een beheerpaneel voor administrators om content te beheren en gebruikersinteracties te modereren.

Quick Start (Lokaal draaien)

Volg deze stappen om het project lokaal werkend te krijgen:

Project klonen
git clone <je-repo-url>
cd project1-laravel

Dependencies installeren
composer install
npm install
npm run dev

.env instellen
cp .env.example .env
php artisan key:generate
Pas daarna database- en mailinstellingen aan in .env.

Database migreren en seeders uitvoeren
php artisan migrate
php artisan db:seed

Storage link aanmaken (voor uploads)
php artisan storage:link

Project starten
php artisan serve
Open de aangegeven URL in je browser.

Login als admin
Standaard admin-account voor testen:
E-mail: admin@ehb.be

Wachtwoord: Password!321

Functionaliteiten
Publieke gebruiker (niet ingelogd)

Nieuwsberichten bekijken

Zoeken in nieuwsartikels

FAQ-sectie bekijken en filteren per categorie

Contactformulier invullen (berichten worden gelogd)

Ingelogde gebruiker

Eigen profiel bekijken en aanpassen (naam, e-mail, bio, profielfoto)

Reageren op nieuwsartikels (comments)

Administrator

Nieuws CRUD: aanmaken, bewerken, verwijderen

FAQ CRUD: vragen beheren

Categorieën beheren

Overzicht van contactberichten in admin-panel

Beheren van gebruikersreacties op nieuws

Dashboard en extra features zoals zoeken in nieuws

Extra Functionaliteiten

Admin panel voor contactberichten

Nieuws zoekfunctie (titel + content)

UI-polijsten: navbar, footer en layout verbeterd

Mogelijkheid om statistieken te tonen (optioneel)

Like-systeem voor nieuwsartikelen (optioneel)

Technische Details

Framework: Laravel 10

CSS: Tailwind

Authenticatie: Laravel Breeze

Database: lokaal ingesteld in .env (MySQL/MariaDB of andere, afhankelijk van je setup)

Uploads: opgeslagen in storage/app/public

Mailer: log, berichten naar storage/logs/laravel.log

Blade-componenten voor herbruikbare UI-elementen

Middleware: authenticatie + admin-check

Comments: relaties via Eloquent (User ↔ Comments ↔ News)

Gebruikte Modules/Pagina’s

Profielpagina met foto, bio en uploadfunctie

Nieuws: index, show, admin CRUD, zoekfunctie

FAQ + categorieën: filterbaar, admin CRUD

Contactformulier: validatie en logging

Admin panel: overzicht contactberichten, FAQ, nieuws en categorieën

Bronvermeldingen

Laravel documentation: https://laravel.com/docs

Tailwind CSS: https://tailwindcss.com/docs

Laravel Breeze: https://laravel.com/docs/10.x/starter-kits#breeze

StackOverflow & online tutorials als referentie (code volledig begrepen en aangepast)

Testen & Gebruik

Nieuws zoeken: gebruik de zoekbalk bovenaan /news

Contactformulier: berichten verschijnen in storage/logs/laravel.log

Admin: login en controleer /admin/contacts

UI: buttons moeten duidelijk zichtbaar zijn, .btn-glam gebruikt

GlamNet is volledig functioneel en bevat zowel alle verplichte functionaliteiten als extra features zoals het admin-panel en nieuws-zoekfunctie.
