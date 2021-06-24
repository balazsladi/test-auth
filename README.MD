**AuthDriver**

Ebben a példakódban egy Third-party authentikációt látunk, amely Google, Facebook és Apple login/signup funkciót valósítja meg. A kód egy mobil applikáció API-ja, ami JSON formátumban várja az egyes szolgáltatóktól szerzett access tokeneket. Az API az access token alapján lekéri a felhasználó adatait - ha szükséges - felhasználót hoz létre az adatbázisban, és a saját rendszerünkhöz tartozó tokent ad vissza, amivel már authorizálni tudja magát.

Ehhez egy abstract AuthDriver osztályt hoztam létre, amelyből leszármazva tudunk megvalósítani további szolgáltatókat. Az AuthDriverProvider segítségével elegendő egy controller metódus és egy paraméterezhető endpoint használata bármennyi third-party szolgáltató használatához. Példa: AuthenticationController és routes/api.php