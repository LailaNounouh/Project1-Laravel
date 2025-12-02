# GlamConnect — Laravel Webapplicatie

GlamConnect is een dynamische Laravel-toepassing voor studenten en docenten. De website biedt nieuws, FAQ’s, contactformulieren en gebruikersprofielen. Administrators kunnen alle inhoud beheren via een aparte adminomgeving.

---

## Installatiehandleiding

### 1. Project klonen
- `git clone <repository-url>`
- `cd glamconnect`

### 2. Dependencies installeren
- `composer install`
- `npm install`
- `npm run dev`

### 3. .env configureren
- `cp .env.example .env`
- `php artisan key:generate`
- Vul je database-instellingen en mail-instellingen aan in `.env`.

### 4. Database migreren & seeders uitvoeren
- `php artisan migrate`
- `php artisan db:seed`

### 5. Storage link aanmaken
- `php artisan storage:link`

### 6. Project starten
- `php artisan serve`

### 7. Testadmin
**E-mail:** admin@ehb.be  
**Wachtwoord:** Password!321

---

## Functionaliteiten

### Publieke gebruikers
- Nieuws bekijken
- Zoeken op nieuwsartikelen
- FAQ raadplegen en filteren op categorie
- Contactformulier gebruiken

### Ingelogde gebruikers
- Eigen profielpagina bekijken
- Profiel bewerken (naam, e-mail, bio, profielfoto)
- Reacties plaatsen op nieuwsartikelen

### Administrators
- CRUD voor nieuwsitems
- FAQ- en categoriebeheer
- Overzicht van alle contactberichten
- Beheer van gebruikersreacties op nieuws
- Extra toevoegingen zoals zoekfunctie, verbeterde UI en optionele uitbreidingen

---

## Technische informatie

- **Framework:** Laravel 10  
- **CSS:** Tailwind  
- **Authenticatie:** Laravel Breeze  
- **Database:** SQLite (geconfigureerd via .env)
- **Uploads:** `storage/app/public`  
- **Mailer:** log-driver (`storage/logs/laravel.log`)  
- **Blade:** herbruikbare componenten  
- **Middleware:** authenticatie + admin-check  
- **Routes:** controllers + middleware + grouping waar mogelijk  
- **Relaties:** meerdere one-to-many en many-to-many relaties (bijv. News ↔ Comments, FAQ ↔ Categories)

---

## Testen

- Nieuws zoeken via `/news`
- FAQ filteren via `/faq`
- Contactformulier testen (mail-log)
- Adminpanel testen via `/admin`
- Profielfoto-upload testen via profielpagina

---

## Bronvermelding

- Laravel documentation  
- Tailwind CSS  
- Laravel Breeze  
- StackOverflow & diverse tutorials (code begrepen en aangepast)

---
