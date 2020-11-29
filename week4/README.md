# Huiswerk week 4

## Onderwerpen 
- MySQL
    - DELETE
    - INSERT INTO
    - UPDATE

## Opdracht 4.1

**Music collection - Delete**

Voeg in de list view (index) een **delete** link toe voor elk album. Wanneer een bezoeker
op de link klikt wordt het album in zijn geheel uit de database verwijderd. Het plaatje in de map
images mag je laten staan.

## Opdracht 4.2

**Music collection - Create**

Zorg dat de data uit het createformulier in de database komt te staan.
Het plaatje mag je nu nog met de hand toevoegen. Dit betekent dat er wel een input field is van
type=”text” voor de link naar het plaatje, maar hier tik je handmatig de naam van het plaatje in.
Het plaatje zelf plaats je handmatig in de map ‘images’.

Let op! Voordat je de link opslaat in de database zal je via php, voor de naam van het plaatje
‘images/’ als string moeten plaatsen om de link compleet werkend te maken.

Ook zal de pagina voorzien moeten zijn van validatie. Het controleren van de input-velden
gebeurt dmv een postback (tip: if(isset())

## Opdracht 4.3

**Music collection - Edit**

Zorg dat de data in het editformulier automatisch gevuld wordt vanuit
de database. (Je zal zien dat deze pagina voor een zeer groot deel overeenkomt met create.php)
Ook zal de pagina voorzien moeten zijn van validatie. Het controleren van de input-velden
gebeurt dmv een postback (tip: if(isset())

## Opdracht 4.4 (extra)

Vul opdracht 4.1 aan zodat het plaatje ook van de harde schijf verwijderd wordt.

Zorg er nu voor dat bij opdracht 4.2 en 4.3 de plaatjes dmv php in de images map komen te staan
en de link naar het plaatje in de database. Het input field in de HTML wordt nu een <input
type=”file”> ipv &lt;input type=”text”&gt;. 

Bij een update (edit) van het plaatje moet het oude plaatje eerst
verwijderd worden en de nieuwe geüpload worden en de link aangepast in de database.