# Huiswerk week 6

## Onderwerpen

- Login
- Sessions

## Opdracht 6.1
Maak een loginpagina met een formulier waarin email en wachtwoord ingevoerd kunnen worden.
Maak een aparte tabel ‘users’ in de database. Met daarin de kolommen _id_, _email_, _password_

Maak de loginpagina werkend zodat bij een foutieve login een error massage getoond wordt (op
dezelfde pagina) en bij een goede combinatie van email en password ‘login succes’ getoond
wordt.

Tip: kijk de volgende video’s van de php cursus op Pluralsight:
- PHP Password Hashing API
- Storing Passwords
- Validating Passwords

## Opdracht 6.2
Voeg aan de loginpagina een SESSION toe. Wanneer de gebruiker juist is ingelogd wordt de id en
email in de session opgeslagen.
Beveilig de createpagina zodat gebruikers die niet ingelogd zijn ook niet op de pagina kunnen
komen. In plaats daarvan worden ze doorgestuurd naar de loginpagina.

## Opdracht 6.3
Maak de logoutpagina werkend

## Opdracht 6.4
Zorg dat in de tabel van de albums ook opgeslagen wordt wie het album ingevoerd heeft. Denk na
over een efficiënte manier waarop je dit kunt oplossen.
Let op, een persoon moet natuurlijk meerdere albums kunnen invoeren.
