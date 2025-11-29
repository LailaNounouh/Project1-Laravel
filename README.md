# GlamConnect — Student Project

GlamConnect is een Laravel-project gebouwd als oefening rond authenticatie, CRUD-functionaliteiten, filtering, uploads, reactiesystemen en algemeen webdevelopment.  
Het project is bedoeld als portfolio-opdracht en bevat een publiek gedeelte en een admingedeelte.

---

## Installatie (quick start)

1. Clone de repo:
```bash
git clone <repository-url>
cd <projectfolder>
Installeer dependencies:

composer install
npm install
Kopieer en configureer het environment bestand:


cp .env.example .env
Bewerk .env en zet minstens de database-instellingen en:


MAIL_MAILER=log
Maak de storage-link:


php artisan storage:link
Voer migraties en seeders uit (zodat er een admin-account en voorbeelddata komen):


php artisan migrate --seed
Bouw de frontend assets:


npm run build
(voor development kan npm run dev gebruikt worden)

Start de server (of gebruik Herd):

php artisan serve
Inloggegevens (default admin)
Email: admin@ehb.be

Wachtwoord: Password!321

Belangrijkste features
Publiek
Home / nieuws (list & detail)

FAQ-pagina met categorie-filter

Contactformulier (validatie + log van mails naar storage/logs/laravel.log)

Registratie en login

Ingelogde gebruiker
Profielpagina (naam, e-mail, bio, profielfoto)

Profiel bewerken en profielfoto uploaden (via Laravel storage)

Reacties plaatsen onder nieuwsartikelen

Admin
CRUD voor nieuws (nieuw bericht, bewerken, verwijderen)

CRUD voor FAQ’s en categorieën

Admin-paneel met inzendingen/contactberichten

Alleen admin kan news/faq beheren (middleware is_admin)

Projectstructuur (kort)
app/Models — Eloquent modellen (User, News, Faq, Category, Contact, Comment)

app/Http/Controllers — Controllers (NewsController, FaqController, ContactController, ProfileController, Admin/*)

database/migrations — Migrations

database/seeders — Seeders (AdminUserSeeder, FaqSeeder, NewsSeeder, etc.)

resources/views — Blade views (layouts, news, faq, admin, contact, profile)

routes/web.php — Webroutes

Testing / debug tips
Als afbeeldingen ontbreken: controleer php artisan storage:link.

Mail testen: MAIL_MAILER=log (berichten verschijnen in storage/logs/laravel.log).

Sessies/CSRF errors: controleer .env APP_URL en herstart de server.

Routes bekijken: php artisan route:list

Cache/route view clear: php artisan optimize:clear (zorg dat je geen belangrijke cache-bestanden verwijderd die je handmatig had bewerkt)

Bronvermelding & hulpbronnen
Laravel (officiële docs) — https://laravel.com/docs

TailwindCSS (styling) — https://tailwindcss.com/docs

StackOverflow & Laravel community voor foutoplossingen

Extra notities voor de docent / beoordelaar
Het project bevat seed-data zodat het snel te testen is.

Admin-account staat in seeder (credentials hierboven).

Features zijn gebouwd rekening houdend met de technische vereisten (Eloquent-relaties, controllers, middleware, CSRF-protectie, XSS-bescherming in views waar nodig, resource controllers waar toepasbaar).

Auteur
Laila Nounouh — Student, Erasmus Hogeschool Brussel
