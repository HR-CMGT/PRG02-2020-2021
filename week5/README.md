# Huiswerk week 5

## Onderwerpen

- Database update query
- Login
- Sessions

## Opdracht 5.1

**Music collection - Edit**

Zorg dat de data in het editformulier automatisch gevuld wordt vanuit
de database. (Je zal zien dat deze pagina voor een zeer groot deel overeenkomt met create.php)
Ook zal de pagina voorzien moeten zijn van validatie. Het controleren van de input-velden
gebeurt dmv een postback (tip: if(isset())

### Opdracht 5.1.1 (extra)
Bij een update (edit) van het plaatje moet het oude plaatje eerst
verwijderd worden en de nieuwe geüpload worden en de link aangepast in de database.

## Opdracht 5.2
Maak een loginpagina met een formulier waarin email en wachtwoord ingevoerd kunnen worden.
Maak een aparte tabel ‘users’ in de database. Met daarin de kolommen _id_, _email_, _password_

Maak de loginpagina werkend zodat bij een foutieve login een error massage getoond wordt (op
dezelfde pagina) en bij een goede combinatie van email en password ‘login succes’ getoond
wordt.

Tip: kijk de volgende video’s van de php cursus op Pluralsight:
- PHP Password Hashing API
- Storing Passwords
- Validating Passwords

## Opdracht 5.3
Voeg aan de loginpagina een SESSION toe. Wanneer de gebruiker juist is ingelogd wordt de id en
email in de session opgeslagen.
Beveilig de createpagina zodat gebruikers die niet ingelogd zijn ook niet op de pagina kunnen
komen. In plaats daarvan worden ze doorgestuurd naar de loginpagina.

## Opdracht 5.4
Maak de logoutpagina werkend

## Opdracht 5.5
Zorg dat in de tabel van de albums ook opgeslagen wordt wie het album ingevoerd heeft. Denk na
over een efficiënte manier waarop je dit kunt oplossen.
Let op, een persoon moet natuurlijk meerdere albums kunnen invoeren.
