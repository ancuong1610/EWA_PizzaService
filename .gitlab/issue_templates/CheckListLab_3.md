---
name: Checkliste Praktikum 3
about: Template zur Bewertung des Praktikums

---

# Bewertung Code
- [ ] Das Verzeichnis enthält die neue Seite Kundenstatus?
- [ ] Kundenstatus: Als Seitenklasse umgesetzt?
- [ ] Kundenstatus: Aufruf von session_start zu Beginn der Seite? (main?)
- [ ] Kundenstatus: Beschaffung der Pizzadaten des Kunden mit Session?
- [ ] Kundenstatus: Versenden der Statusdaten mittels JSON in generateView()?
- [ ] Kundenstatus: Fehler abgefangen, falls keine Session oder keine Pizza vorhanden?

- [ ] Fahrer: XSS über Adressfeld abgewehrt (htmlspecialchars)? 
- [ ] Fahrer: htmlspecialchars erst in generateView?
- [ ] Fahrer: getViewData gibt die Daten als (unbearbeitetes) von der Datenbank unabhängiges, assoziatives Array zurück?
- [ ] Fahrer (und Bestellung, Bäcker): SQL-Injection abgewehrt (ungefährliche Datentypen, real_escape oder Prepared Statements)?
- [ ] Prüfung ob benutzte Daten, die von außen kommen ($_POST[xx]...), tatsächlich definiert sind (isset)?

# Bewertung der Funktion
Testszenario: Eine Bestellung mit der Adresse \<h1\>Test\<\/h1\> und einer Pizza abschicken!
- [ ] Ausgabe eines JSON-Strings mit der neuen Pizza bei direktem Aufruf der Kundenstatus-Seite?
- [ ] Sessionmanagement funktioniert zwischen Bestellseite und Kundenstatus? Kunde sieht nur seine Pizzen (im 2. Browser testen!)?
- [ ] Auf der Fahrerseite wird die Adresse mit den HTML-Tags angezeigt (ohne sie auszuführen)?
- [ ] Funktioniert die Bestell- und Kundenstatusseite ohne bereits vorhandene Sessiondaten - also bei erstmaliger Nutzung? (Test in einem Private-Tab)

# Abgabe
- [ ] Die Bestellseite erfüllt weitgehend die Kundenanforderungen
- [ ] Die Kundenseite erfüllt weitgehend die Kundenanforderungen
- [ ] Die Kundenstatus-Seite liefert die gewünschten Kundendaten
- [ ] Die Bäckerseite erfüllt weitgehend die Kundenanforderungen
- [ ] Die Fahrerseite erfüllt weitgehend die Kundenanforderungen

# Bemerkungen / Hinweise
- 

# Gesamtergebnis (Ampelskala)
- 
