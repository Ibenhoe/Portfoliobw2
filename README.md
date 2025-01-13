# Cookie Clicker

Deze website is een project gemaakt met Laravel 11, en bevat alle functionele eisen, en een aantal extra eisen zoals beschreven in de project beschrijving.

## Stappen om het project te laten werken

Volg de onderstaande stappen om het project te laten werken:

1.  **Kloon de repository naar je lokale computer:**

    ```bash
    git clone https://github.com/Ibenhoe/Portfoliobw2.git
    ```

2.  **Ga naar de project map:**

    ```bash
    cd <Porfoliobw3>
    ```

3.  **Installeer alle afhankelijkheden met composer:**

    ```bash
    composer install
    ```

4.  **Kopieer de `.env.example` file naar `.env`:**

    ```bash
    copy .env.example .env
    ```

5.  **Configureer de database:**
     *  Open de `.env` file en vul je database gegevens correct aan, zoals database naam, username, wachtwoord, etc.
       ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=porfoliobw2
        DB_USERNAME=root
        DB_PASSWORD=
      ```

6. **Maak een key aan:**
   * Voer het volgende commando uit in je terminal:
     ```bash
       php artisan key:generate
     ```
7. **Storage Link:**
   * Voer het volgende command uit in je terminal:
     ```bash
      php artisan storage:link
      ```
8.  **Migreer de database:**

    ```bash
    php artisan migrate:fresh --seed
    ```
    *  Hierdoor worden alle tables aangemaakt in de database, en wordt de default admin ook aangemaakt.
9.  **Configureer mail settings**
    *  In je .env file, pas de mail configuratie aan naar de volgende instellingen:
   ```env
    MAIL_MAILER=log
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="admin@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
     ```
     * Hierdoor worden de mails opgeslagen in een log file.

10. **Start de development server:**

    ```bash
    php artisan serve
    ```

11. **Open je applicatie:** Ga naar `http://localhost:8000` in je browser.

12. **Admin:**
  * De default admin gebruiker om in te loggen is:
    * Username: `admin`
    * Email: `admin@ehb.be`
    * Password: `Password!321`

## Functionaliteiten

*   **Login Systeem:** Bezoekers kunnen inloggen, registreren, en hebben een rol (admin of gebruiker).
*   **Publieke profielpagina:** Gebruikers hebben een publiek profiel, die ze zelf kunnen aanpassen, als ze zijn ingelogd.
*   **Nieuws:** Admins kunnen nieuwsitems toevoegen, wijzigen en verwijderen. Bezoekers kunnen de nieuwsitems bekijken en reageren.
*   **FAQ:** Admins kunnen de FAQ categorieën en vragen/antwoorden beheren, bezoekers kunnen de FAQ bekijken.
*   **Contact:** Bezoekers kunnen een contactformulier invullen. De admin krijgt een mail.
*   **Admin Dashboard:** Admins hebben een admin panel met gebruikersbeheer, nieuwsbeheer, FAQ beheer en kunnen contactformulieren bekijken en beantwoorden.
*  **Clicker:** Bezoekers kunnen op een newsitem klikken, en hun clicks worden opgeslagen.
* **Zoek Functionaliteit**: Gebruikers kunnen een andere gebruiker zoeken op naam, op de home pagina, en dan hun public profielpagina bezoeken.

## Bronvermeldingen

Tijdens het ontwikkelen van dit project heb ik gebruik gemaakt van de volgende bronnen:

*   **Laravel Dokumentatie:** [https://laravel.com/docs](https://laravel.com/docs)
    *   Ik heb de officiële documentatie geraadpleegd voor de meeste concepten, zoals controllers, routes, models, authenticatie, mail, form validation en migrations.

*   **Laravel UI**:  [https://laravel.com/docs/11.x/starter-kits#laravel-ui](https://laravel.com/docs/11.x/starter-kits#laravel-ui)
    *   Ik heb Laravel UI gebruikt om snel de basis authenticatie in het project te krijgen
*   **Laravel Sanctum**: [https://laravel.com/docs/11.x/sanctum](https://laravel.com/docs/11.x/sanctum)
  * Ik heb Laravel Sanctum gebruikt voor API authenticatie.
*   **Stack Overflow:** Diverse antwoorden op specifieke problemen.
    *   Er zijn verschillende antwoorden en snippets gebruikt voor styling, en php syntax problemen.
*  **Course Resources**
   *  Ik heb de technieken uit de les gebruikt, om te zien hoe de verschillende onderdelen werken, en hoe ik deze in mijn eigen project kon gebruiken.

## Belangrijke Informatie

*   **Database:** Dit project gebruikt MySQL.
*   **.env file:** Zorg ervoor dat de `.env` file correct is geconfigureerd met de database gegevens, en mail gegevens.
*   **Admin:** Na de migrations, heb je de mogelijkheid om de database te seeden met een default admin (admin@ehb.be / Password!321).

