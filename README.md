# REST_API_Quotes

Este o aplicatie de tip REST API care salveaza si returneaza diferite citate din baza de date daily_quotes. Endpoint-uri:

GET: /api/quote/read.php – un citat ALEATOR
GET: /api/quote/read.php?domain= un citat ALEATOR din domeniul specificat
GET: /api/quote/read.php?id= - citatul cu id-ul specificat
POST: /api/quote/create.php – adaugare de citat
Baza de date: daily_quotes Tabela: qoute - id INT PRIMARY KEY - quote TEXT - domain VARCHAR(50)
