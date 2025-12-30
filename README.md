#  GlamConnect — Laravel Webapplicatie

**GlamConnect** is een dynamische **Laravel-webapplicatie** rond beauty, make-up en lifestyle.  
De website fungeert als een online lookbook waar gebruikers inspiratie kunnen ontdekken, nieuws kunnen lezen en reacties kunnen plaatsen.  
Administrators beheren alle inhoud via een aparte **adminomgeving**.

---

##  Installatiehandleiding

Volg onderstaande stappen om het project lokaal op te zetten.

### 1. Project klonen
git clone <repository-url>
cd Project1-Laravel



### 2. Dependencies installeren
composer install
npm install
npm run dev



### 3. .env configureren
cp .env.example .env
php artisan key:generate


Controleer en configureer vervolgens **database-** en **mailinstellingen** in het `.env`-bestand.

### 4. Database migreren & seeders uitvoeren
php artisan migrate:fresh --seed



### 5. Storage link aanmaken
php artisan storage:link



### 6. Project starten
php artisan serve



### 7. Testadmin
**E-mail:** admin@ehb.be  
**Wachtwoord:** Password!321

---

##  Functionaliteiten

### Publieke gebruikers
- Nieuws bekijken  
- Zoeken op nieuwsartikelen  
- FAQ raadplegen per categorie  
- Contactformulier gebruiken  

### Ingelogde gebruikers
- Registreren en inloggen  
- Eigen profielpagina bekijken  
- Profiel bewerken (naam, e-mail, bio, profielfoto)  
- Interesses selecteren  
- Reacties plaatsen op nieuwsartikelen  
- Wachtwoord wijzigen  

### Administrators
- Adminpanel met aparte layout  
- CRUD voor nieuwsitems  
- FAQ- en categoriebeheer  
- Overzicht van alle contactberichten  
- Gebruikers beheren (adminrechten toekennen en afnemen)  

---

##  Technische informatie

| Component | Technologie |
|------------|--------------|
| **Framework** | Laravel 10 |
| **CSS** | Tailwind CSS |
| **Authenticatie** | Laravel Breeze |
| **Database** | SQLite (via `.env`) |
| **Uploads** | `storage/app/public` |
| **Mailer** | Log-driver (`storage/logs/laravel.log`) |
| **Views** | Herbruikbare Blade-componenten |
| **Middleware** | Authenticatie + admin-check |
| **Routes** | Controllers met middleware en route grouping |

---

##  Relaties

- **One-to-many:** News ↔ Comments  
- **One-to-many:** Category ↔ FAQ  
- **Many-to-many:** User ↔ Category *(interesses)*  

---

##  Testen

- Nieuws bekijken via [`/news`](http://localhost:8000/news)  
- FAQ raadplegen via [`/faq`](http://localhost:8000/faq)  
- Contactformulier testen *(mail wordt gelogd)*  
- Adminpanel testen via [`/admin`](http://localhost:8000/admin)  
- Profielfoto-upload testen via profielpagina  

---

##  Bronvermelding

- [Laravel Documentation](https://laravel.com/docs)  
- [Tailwind CSS](https://tailwindcss.com/)  
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)  
- StackOverflow en diverse tutorials  

---

##  Opmerking

Dit project is volledig **seed-proof**.  
Een docent kan met het commando hieronder een volledig werkende demo-website genereren:

php artisan migrate:fresh --seed


Na uitvoeren is de site direct klaar voor gebruik.  

---

© 2025 *GlamConnect*.  
Alle gebruikte code is begrepen en waar nodig aangepast.
