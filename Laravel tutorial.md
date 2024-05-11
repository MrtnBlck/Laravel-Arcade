## Telepítés

1. **PHP és Composer Telepítés:**\
   A php telepítése nehézkes lehet, mivel alapvetően csak szervereken szokott futni. Azonban [ezen a repon](https://github.com/totadavid95/PhpComposerInstaller) találsz egy nagyon jó csomagot, ami mindent elvégez számodra.
   **_Fontos:_** _Ha már lenne valamilyen php/composer verzió a gépeden, azt töröld!_
2. **Laravel projekt létrehozása**\
   Miután sikeresen települt a composer, futtasd a neki szánt mappában a következő parancsot:

    ```
    composer create-project laravel/laravel projekt_neve
    ```

3. **Laravel Breeze telepítés (Autentikációs csomag)**\
   A bejelentkezéshez nem szükséges feltalálni a spanyol viaszt, így egy létező csomagot fogunk használni.
   Navigálj a terminálban **cd** parancsokat használva a projekt mappájába, majd futtasd a következőt:

    ```
    composer require laravel/breeze --dev
    ```

    Ha letöltődött, akkor a következő parancsot futtasd:

    ```
    php artisan breeze:install
    ```

    Futtatás közben megfog kérdezni, hogy milyen frontend-et szeretnénk használni, itt válaszd a **_Blade_** opciót.
    A Dark mode-os és a Unit Test-es kérdésnél maradhat a default, szóval csak nyomj enter-t.

4. **Node telepítés**\
   Node-ra a frontend kapcsán lesz szükségünk, hogy telepíteni és futtatni tudjuk a szükséges csomagokat.\
   [Innen](https://nodejs.org/en/download/) tudod letölteni.\
   Miután települt, futtasd a következő parancsokat a projekt mappájában:

    ```
    composer i
    npm i
    ```

    Ezek telepíteni fognak minden csomagot, ami szükséges lehet a későbbiekben.

5. **Tailwind plugin hozzáadása**\
   A frontend-hez Tailwindet, és a DaisyUI plugint használtam.\
   Futtasd a következő parancsot:
    ```
    npm i -D daisyui@latest
    ```
    Majd módosítsd a tailwind.config.js fájlt a következőképpen:
    ```
    export default {
        \\...
        plugins: [forms, require("daisyui")],
    };
    ```

## Egyéb beállítások

-   **Custom betűtípus beállítása**\
    A resources mappába hozz létre egy fonts mappát, és illeszd be a GeistVariableVF.woff2 fájlt. Ezt megtalálod az én projektemben majd.\
    Módosítsd szintén a tailwind.config.js fájlt:

    ```
    export default {
        \\...
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Geist', ...defaultTheme.fontFamily.sans],
                },
            },
        },
    };
    ```

    app.css fájl:

    ```
    @font-face {
        font-family: "Geist";
            src: url("../fonts/GeistVariableVF.woff2") format("woff2 supports variations"),
            url("../fonts/GeistVariableVF.woff2") format("woff2-variations");
        }
    ```

-   **.env fájl módosítása**\
    A .env fájlban találhatóak az úgynevezett enviroment változók, itt a módosítás főleg az URL-t és az adatbázis miatt fontos, de inkább másold át az egészet az én fájlomból.

## Hasznos VS code extensionok

-   **SQLite Viewer**\
     Lehetővé teszi az adatbázis fájl megtekintését az editoron belül (database.sqlite)
-   **Laravel Blade formatter**\
     .blade.php fájloknál formázás
-   **Laravel Blade Snippets**\
     .blade.php fájloknál syntax highlight és kiegészítés
-   **PHP Intelephense**\
     .php fájloknál syntax highlight és kiegészítés
-   **Tailwind CSS IntelliSense**\
     Tailwind classok kiegészítése
-   **Tailwind Fold**\
     Tailwind classok elrejtése

## Futtatás

-   **Laravel projekt indítása**
    ```
    php artisan serve
    ```
-   **Frontend framework indítása**
    ```
    npm run dev
    ```

## Későbbiekben hasznos parancsok

_Konkrét példák a phpcommands.php fájlban._

-   **Adatbázis resetelése**
    ```
    php artisan migrate:fresh --seed
    ```
-   **Kép fájlok kezeléséhez szükséges mappaösszekapcsolás**
    ```
    php artisan storage:link
    ```
-   **Modell létrehozása**
    ```
    php artisan make:model modell_neve -fms
    ```
-   **Controller létrehozása**
    ```
    php artisan make:controller modell_neveController -r
    ```
-   **Kapcsolótábla létrehozása**

    ```
    php artisan make:migration create_modell1_modell2_table
    ```

    Itt lehetséges, hogy fordítva fogja keresni a létrehozni a táblát, így lehet, hogy törölni kell majd, és fordítva létrehozni:

    ```
    php artisan make:migration create_modell2_modell1_table
    ```
