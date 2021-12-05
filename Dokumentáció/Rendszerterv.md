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

    - Regisztrációs adatok mentése
    - Jelszavak titkosítása
    - Jelszó erősség ellenörzése
    - Bejelentkezés ellenőrzése
    - Bejelentkezésre való lehetőség létrehozása
    - Kijelentkezés biztosítása
    - Kosárhoz kötető funkciók (betevés, kivevés) biztosítása
    - Termék megrendelés lehetősége

5. Funkcionális terv
    - Bejelentkezés:
        - E-mail cím és jelszó használatával
        - Nem megfelelő e-mail/jelszó esetén a hiba visszajelzése

    - Regisztráció:
        - Email és jelszó használatával
        - Jelszó erősség ellenörzése
        - Használatban lévő email cím ellenörzése
        - Ellenőrzés gyanánt a jelszót kétszer kell ellenőrizni

    - Profil:
        - Email-cím megjelenítése
        - Korábbi és folyamatban lévő rendelések ellenőrzése

    - Frontend:
        - Keresés weblapon belül 
        - Kategóriák és alkategóriák kialakítása
        - Adott termékek részletes leírásának megtekintése

    - Kosár:
        - Kiválasztott termékek eltárolása
        - Adatok hiányában a rendelés nem jöhet létre 
        - Kosárban lévő tárgyak eltávolítása
        - Kosárban lévő termékek megvásárlása

    - Megrendelés:
        - Rendelési adatok beállítása és azok elmentése a profilra 


6. Adatbázis terv

    Az felhasználói adatok (email, jelszó, lakhely, név), kosár adatok, rendelési adatok, kuponkódok és a termékek egy MySQL adatbázisabn vannak eltárolva. 

    ![adatbazis](https://raw.githubusercontent.com/szepema/Webshop/main/Dokument%C3%A1ci%C3%B3/adatbazis.PNG)


7. Fizikai környezet

    - A webshop projekt egy böngészőben megnyitható weboldal 
    - Elkészítésére a következő szoftvereket használtuk
        - Fejlesztői környezetek:
            - Visual Studio Code
            - NotePad++
            - Google Chrome
            - Firefox
            - Chromium
        - Webtárhely:
            - 000webhostapp.com
        - Adatbázis:
            - phpMyAdmin

8. Hiba üzenetek

    A weboldalon több helyen is találkozhatunk hiba üzenetekkel. Akkor kaphatunk ilyet, ha regisztrációnál már létező email címet akarunk használni, a jelszó nem felel meg a jeslzó formálási feltételeknek és ha két beírt jelszó nem felel meg egymásnak. A bejelentkező oldalon akkor kaphatunk ilyet, ha az adatbázisban nem található meg a jelszó, vagy az email cím. A rendelési funkciónál akkor kaphatunk hibát, ha a megadott mezők kitöltése nélkül akarunk rendelni.