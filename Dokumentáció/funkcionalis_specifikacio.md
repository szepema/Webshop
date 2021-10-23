Funkcionális specifikáció
=========================

1. Jelenlegi helyzet leírása

   A Webshop projektünkkel kapcsolatos feladatokat felosztottunk a következőre: Adatbázis elkészítése, bejelentkezés és regisztráció elkészítése, kosár funkció létrehozása, weboldal design implementálása

2. Vágyálom rendszer leírása

    Célunk egy olyan PHP és HTML alapokra épülő weboldal ami össze van kötve egy MySQL adatbázissal, ahova menti és ahonnan lekérdezi az adatokat. Menteni a regisztrációs és kosárral kapcsolatos adatokat fogja, lekérdezni pedig a bejelentkezéshez szükséges és a weboldalon található termékekkel kapcsolatos adatokat fogja.

4. Lehetséges üzleti folyamatok

    Manapság minden sikeresebb áruház/üzletlánc rendelkezik webes felülettel is, hogy a vásárlók online is elintézhessék vásárlási szándékaikat. Itt jön be a képbe a projektünk, amivel azoknak a cégeknek szeretnénk segíteni akiknek erre nincsen meg a saját infrastruktúrájuk. Ha igénybe veszik szolgáltatásinkat, személyre szabjuk a weboldalunkat a vevő igényei szerint.

6. Követelmény lista

    - Jelszavak és személyes adatok titkosítása
    - Jelszó erősség ellenörzése
    - Bejelentkezésre való lehetőség létrehozása
    - Kijelentkezés biztosítása
    - Kosárhoz kötető funkciók (betevés, kivevés) biztosítása

7. Használati esetek

    - A felhasználónak a következő lehetőségei vannak a weblap használata közben:
        - Regisztrálhat az oldalra
        - Bejelenkezhet az oldalra
        - Kijelenkezhet az oldalról
        - Megtekintheti a kategóriákat, alkategóriákat és a termékek oldalait
        - Megnyithatja az ÁSZF-et
        - A kosárba betehet, kivehet termékeket
        - Megadhat kuponkódot a vásárlás során
        - Megadthatja a szállítási adait
        
8. Képernyő tervek

    A következő víziónk volt a weboldal kinézetéről

    ![fooldal](https://raw.githubusercontent.com/szepema/Webshop/main/Dokument%C3%A1ci%C3%B3/fooldal.png)

    ![bejelentkezes](https://raw.githubusercontent.com/szepema/Webshop/main/Dokument%C3%A1ci%C3%B3/bejelentkezes.png)
10. Forgató könyvek

    (v1.0)

    Ha egy felhasználó meglátogatja a weboldalt, lehetősége van regisztrálni, vagy bejelentkezni.
    
    Amennyiben a regisztrációt választja, megfelelő felhasználónév és jelszó választása után létrehozhatja a fiókját.
    
    Amennyiben a felhasználó be szeretne jelentkezni, megfelelő felhasználónév és jelszó használatával ezt megteheti a bejelentkezési
    felületen.
    
    Bejelentkezés után láthatóvá válik a chat felület, ahol tud kommunikálni (üzenetet küldeni) a többi, aktív felhasználóval.
    
    Az új, bejelentkezett felhasználó aktív státusszal látható lesz a többi résztvevő számára.
    
    Üzenet küldése után megjelenik minden fél számára az üzenet, szinte azonnal.
    
    Kijelentkezésnél a felhasználó eltűnik az aktív felhasználók listjáról.
    
    (v2.0)
    
    A weboldal meglátogatása után megjelenik a bejelentkező felület, amely már nem csak felhasználónév és jelszó párossal engedi a
    rendszerbe való belépést, hanem már a Google, GitHub és Atlassian fiókjával (harmadik felektől származó fiókok).
    
    Bejelentkezés után egy kezelőfelület fogadja a felhasználót.
    
    A kezelőfelületen lehetősége van egy opció kiválasztására több köszül.
    
        1. Az egyik opció, egy már létező chat szobába való becsatlakozás.
        2. A másik opció egy új chat szoba létrehozás.
    
    Amennyiben a felhasználó be szeretne csatlakozni egy már létező szobába, a csatlakozás gombra kattintva ez a folyamat megtörténik és
    addig tartózkodik a szobában, amíg vagy ki nem jelentkezik / bezárja a weboldalt, vagy kilép a szobából való kilépésre szolgáló gombbal
    (kilépés a szobából).
    
    Ellenkező esetben, ha új szobát szeretne létrehozni, a szoba nevének megadása után a "Létrehozás" gombra kattintva teheti meg. Egy
    szoba addig létezik, amíg törlése nem kerül. Létrehozás után nem kerül be automatikusan a szobába, explicit módon kell az előző pontban
    történő leírás alapján csatlakozni.
    
    A felhasználónak a kezelő felületen kívűl megjelenik egy gomb, amely célja a felhasználói beállítások állítása, mint például az
    elküldött üzenetek automatikus fordításának kikapcsolás, vagy egy tetszőleges háttér beállítása, amellyel tudja személyre szabni a
    felületét. A háttér állítása során csak annak a felhasználónak változik a háttere, amelyik végrehajtotta a folyamatot, a többi
    felhasználónál nem történik változás (ezért is személyre szabás).
    
    Egy szobába való csatlakozás után lehetőség lesz a szoba törlésére, egy arra szolgáló gombbal. Fontos megjegyezni, hogy csak az tudja a
    szobát törölni, aki létrehozta az adott szobát.
    
    A szobának beállításai is vannak, mint példáúl alapértelmezett nyelv állítása. Ez az a nyelv, amelyre az üzenetek alapértelmezetten
    lefordításra kerülnek, ha egy felhasználó más nyelven küldené az üzenetét. Amennyiben a felhasználó kikapcsolja a saját beállításaiban
    ezt a fordítást, az elküldött üzenetei nem kerülnek lefordításra se a saját, se más felületén. A fordított szöveg minden felhasználónak
    láthatóvá válik a szobában.
    
    Kijelentkezés után az üzenetek nem vesznek el, mivel a szobák üzenetei az adatbázisban tárolásra kerülnek, így ismételt belépés után
    láthatóvá válnak az előzőleg elküldött üzenetek.

11. Funkció – követelmény megfeleltetés

    A regisztrációhoz és bejelentkezéshez egy közös HTML (+CSS) lap készül, itt egy kattintással dönthet majd a felhasználó, hogy melyiket
    kívánja használni. A felhasználónévre és jelszóra vonatkozó megszorítások megsértéséről egy - a regisztrációs/bejelentkezési blokk
    alatt megjelenő - üzenet fogja informálni a felhasználót (ahogy a regisztráció sikerességéről is). HTML (+CSS) lap készül az üzenetek
    megjelenítésére is, itt lesz lehetőség üzenetet küldeni és megtekinteni, valamint listázni az elérhető felhasználókat.
