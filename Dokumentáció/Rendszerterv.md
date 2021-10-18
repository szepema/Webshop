Webshop Rendszerterv
---

1. A rendszer célja

    Projektünk célja egy üzemeltetői és felhasználói szempontból is egyszerűen használható rezponzív és akadálymentesített webshop weboldal létrehozása. Az oldalra lehet email és jelszó párossal regisztrálni és bejelentkezni. A webshopon megtekinthetőek a megvásárolni kívánt termékek, amik elhelyezhetőek a kosárban. A profil alatt továbbá megtekinthetőek a rendelési előzmények és a kosár tartalma.
    
2. Projektterv
  
  - Projektvezető: Szepesi Máté
  
  - Résztvevők: Csóka Péter, Gődény Szabolcs, Szepesi Máté
  
  - Feladatok:

    - Adatbázis elkészítése
    - Bejelentkezés/Regisztráció elkészítése
    - Kosár funkció elkészítése
    - Frontend rész elkészítése
        

  - Mérföldkövek:
    
    1. Rendszerterv megírása, github és trello létrehozása
    2. Funkcionális és követelmény specifikáció
    3. Adatbázis létrehozása
    4. Bejelenkezés/Regisztráció funkció létrehozása
    5. Kosár elkészítése
    6. Frontend rész létrehozása

4. Követelmények

    - Jelszavak és személyes adatok titkosítása
    - Jelszó erősség ellenörzése
    - Bejelentkezésre való lehetőség létrehozása
    - Kijelentkezés biztosítása
    - Kosárhoz kötető funkciók (betevés, kivevés) biztosítása

5. Funkcionális terv
    - Bejelentkezés:
        - E-mail cím és jelszó használatával
        - Nem megfelelő e-mail/jelszó esetén a hiba visszajelzése

    - Regisztráció:
        - Email és jelszó használatával
        - Jelszó erősség ellenörzése

    - Profil:
        - Állítható vezeték és keresztnév
        - Lakhely/szállításai cím beállítása

    - Frontend:
        - Keresés weblapon belül 
        - Work in progress

    - Kosár:
        - Kiválasztott termékek eltárolása
        - Kosárban lévő tárgyak eltávolítása
        - Kuponok felhasználása
        - Kosárban lévő termékek megvásárlása 


6. Adatbázis terv

    Az felhasználói adatok (email, jelszó, lakhely, név), kosár adatok, rendelési adatok, kuponkódok és a termékek egy MySQL adatbázisabn vannak eltárolva. 


7. Fizikai környezet

    - A webshop projekt egy böngészőben megnyitható weboldal 
    - Elkészítésére a következő szoftvereket használtuk
        - Fejlesztői környezetek:
            - Visual Studio Code
            - NotePad++
            - Google Chrome
            - Firefox
            - Chromium
        - Adatbázis:
            - phpMyAdmin
        

