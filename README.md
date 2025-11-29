GlamNet — Student Project

GlamNet is een dynamische Laravel-webapplicatie voor studenten en docenten, met nieuws, FAQ’s, contactformulieren en gebruikersprofielen. Administrators kunnen content beheren via een admin-panel.

Quick Start (Lokaal draaien)

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
Pas database- en mailinstellingen aan in .env.

Database migreren & seeders uitvoeren
php artisan migrate
php artisan db:seed

Storage link aanmaken
php artisan storage:link

Project starten
php artisan serve

Admin login
E-mail: admin@ehb.be

Wachtwoord: Password!321

Functionaliteiten
Publieke gebruiker

Nieuws bekijken en zoeken

FAQ lezen en filteren

Contactformulier invullen

Ingelogde gebruiker

Profiel bekijken en bewerken (foto, bio, naam, e-mail)

Reageren op nieuwsartikelen

Administrator

Nieuws CRUD (aanmaken, bewerken, verwijderen)

FAQ + categoriebeheer

Overzicht contactberichten

Gebruikersreacties beheren

Extra features: zoekfunctie in nieuws, UI-polijsten, eventueel dashboard/like-systeem

Technische Details

Framework: Laravel 10

CSS: Tailwind

Authenticatie: Laravel Breeze

Database: lokaal ingesteld in .env (MySQL/MariaDB of alternatief)

Uploads: storage/app/public

Mailer: log (storage/logs/laravel.log)

Blade-componenten gebruikt voor herbruikbare UI

Middleware: authenticatie + admin-check

Testen

Nieuws zoeken via /news

Contactformulieren controleren in storage/logs/laravel.log

Admin-panel checken op /admin/contacts

Buttons: .btn-glam gebruikt voor duidelijke styling

Bronvermelding

Laravel documentation

Tailwind CSS

Laravel Breeze

StackOverflow en tutorials als referentie (code volledig begrepen en aangepast)
