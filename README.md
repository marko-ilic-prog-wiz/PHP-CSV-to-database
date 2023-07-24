[English Version](README_en.md)

# Das Setup

Folgende Tools benötigst du heute.

Führst du diesen Test vorort im Büro durch, ist auf diesem PC (hoffentlich) alles installiert, was du zur Lösung deiner Aufgabe brauchst.
Solltest du weitere Programme benötigen, frage bitte nach, bevor du diese installierst.

Ansonsten stelle bitte sicher, dass du folgende Tools installiert hast:

* [Git](https://git-scm.com/downloads)
* Windows/Mac: [Docker Desktop](https://www.docker.com/products/docker-desktop) (inkl. Docker Compose) oder unter Linux: [Docker Engine](https://docs.docker.com/engine/install/) und [Docker Compose](https://docs.docker.com/compose/install/)
* Ein Tool zur Verwaltung der Datenbank (z.B. [DBeaver](https://dbeaver.io/download/))
* eine IDE
* ein Browser

Sollte Docker/Docker Compose auf deinem PC oder Laptop nicht verfügbar sein, verwende bitte ein ähnliches Setup: MySQL und PHP 7.2 (oder höher).

## Die Docker-Umgebung

- `docker-compose build` erstellt die notwendigen Images für die lokale Umgebung. Dieser Schritt ist nur initial und nach einer Änderung am Dockerfile nötig
- `docker-compose up` startet die lokale Umgebung.
- `docker-compose down` stoppt die lokale Umgebung.
- mit `docker-compose exec app bash` kann man sich in den app-Container "einloggen".

Die Dockerumgebung läuft mit PHP 7.2 (installierte Extensions: PDO, mysqli), Apache 2.4 und MySQL 5.6.
Solltest du weitere Extensions benötigen, kannst du diese gern selbst installieren. 
Passe dazu einfach `docker/app/Dockerfile` an. 

Deinen Code legst du bitte in `src/` ab - das Verzeichnis ist in Docker gemounted, Änderungen darin sind also 
sofort sichtbar.

MySQL Zugangsdaten für die Umgebung:

PHP:

* Hostname: db
* Port: 3306 (Standard, nicht benötigt)
* Datenbank: keine definiert, muss noch angelegt werden
* Nutzer: root
* Passwort: mw-it-test

DBeaver:

* Hostname: localhost / 127.0.0.1
* Port: 13306 - diesen *nur* für den Verbindungsaufbau über DBeaver verwenden, *nicht* in PHP)
* Nutzer: root
* Passwort: mw-it-test

Die URL für deinen Browser: `http://localhost:8080/`

## Die Aufgabe

Eine fiktive Kundenverwaltungs-Software hält Kontaktdaten in einer MySQL-Datenbank vor.

Jeder Kontakt bekommt einen Vermerk seit wann er in der Datenbank geführt und wann
sein Datensatz zuletzt verändert wurde.

Folgende Kontaktdaten werden zusätzlich erfasst:

* Anrede
* Vorname
* Nachname
* Geburtsdatum 
* Land
* Email
* Telefonnummer
* Sprache

Um diese Kontakte mit externen Datenbeständen abgleichen und erweitern zu können, soll ein web-basiertes Tool zum 
Import von CSV-Dateien entwickelt werden.

Das Tool soll *beliebig strukturierte* CSV-Dateien mit bis zu 200.000 Datensätzen pro Import verarbeiten können.
Dabei muss zwischen neuen und bereits vorhandenen Kontakten unterschieden werden.
Während neue Kontakte dem Datenbestand lediglich hinzugefügt werden, sollen vorhandene Kontakte mit den neuen
Daten abgeglichen und gegebenenfalls aktualisiert werden.

Beispieldaten die importiert werden sollen finden sich im `data`-Verzeichnis. Schaue dir bitte vorab *alle* Dateien an.

## Die Umsetzung

Die Lösung und der jeweilige Umfang liegt ganz bei dir. Es gibt kein richtig oder falsch. Einzige Bedingung: Wir wünschen uns einen objektorientierten Lösungsansatz.

Findet dein Kennenlerntag unter der Woche statt, steht dir dein Mentor für Fragen oder bei Unklarheiten jederzeit zur Verfügung. 
Solltest du dich dafür entschieden haben, die Aufgabe an einem Wochenende zu lösen, schau dir bitte die Aufgabe und die Dateien vorab genau an,
damit du Fragen oder Unklarheiten bereits im Vorfeld mit deinem Mentor ausräumen kannst.

Fokussiere dich bei der Umsetzung auf 3 der folgenden Punkte (alle 4 gibt ein Achievement :-)):

* große Dateien können verarbeitet werden
* Duplikatserkennung ist möglich
* unterschiedliche Datenstrukturen in den Dateien können verarbeitet werden (siehe Beispieldaten)
* Steuerung erfolgt über eine Oberfläche 

Zur Beurteilung der Datenbankstruktur soll ein Dump der Datenbank im SQL-Format erstellt und mit committed werden.
(kann im Ordner `db-data` im Repository abgelegt werden)

**Wichtig: Committe und pushe deinen Code mindestens abschließend!** Benutzername und Passwort werden dir von deinem 
Mentor mitgeteilt.

## Feedback

Zum Abschluss wird ein kleines Codereview stattinden, bei dem du dich mit deinem Mentor zusammensetzt und ihr gemeinsam den Tag Revue passieren lasst
und deine Lösung, eventuelle Schwierigkeiten bei der Umsetzung und potentielle Verbesserungsmöglichkeiten durchsprecht.

Findet dein Kennenlerntag unter der Woche statt, findet der Termin am späteren Nachmittag statt.
Solltest du dich dafür entschieden haben, die Aufgabe an einem Wochenende zu lösen, findet der Termin zeitnah in der darauffolgenden Woche statt. 
