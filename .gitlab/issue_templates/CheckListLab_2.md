---
name: Checkliste Praktikum 2
about: Template zur Bewertung des Praktikums

---

# Bewertung Code (Stichproben)
- [ ] Das Verzeichnis enthält nur die erwarteten Dateien
- [ ] Implementierung der Seiten Bestellung.php, Kunde.php, Baecker.php und Fahrer.php mittels Seitenklassen? 
- [ ] Page.php: Vollständig ausgefüllt? Destruktor?
- [ ] Page.php: Datenbankzugriff mit Dockerunterstützung und mit User public?
- [ ] Bestellung.php: Rückgabe der Daten aus getViewData als Standarddatenstruktur (z.B. Array)?
- [ ] Baecker.php: Freigabe des DB-RecordSets nach der Nutzung?
- [ ] Fahrer.php: Datenbankzugriffe mittels MySQLi implementiert? 
- [ ] Fahrer.php: Abschicken der Daten mit POST? isset vor Zugriffen auf POST-Variablen?

# Bewertung Funktion
- [ ] Bestellseite: Die "Speisekarte" wird mit den Daten aus den Datenbank erzeugt (z.B. Spinat-Hühnchen für 11.99)? 
- [ ] Bestellseite: Die abschickten Daten werden in der Datenbank abgelegt? (Bestellung abschicken->erscheint neu auf Kundenseite!?)
- [ ] Kundenseite: Zeigt (noch) *alle* bestellten Pizzen? (Die Einschränkung auf die Pizzen des jeweiligen Kunden erfolgt erst in der nächsten Übung durch Sessions.) 
- [ ] Die Bäckerseite zeigt die bestellten Pizzen?
- [ ] Der Bäcker kann den Status einer Pizza (mit einem Submit-Button) abschicken. Die Änderung wird in die Datenbank übernommen? 
- [ ] Die Bäckerseite aktualisiert sich alle 10 Sekunden?
- [ ] Die Bäckerseite zeigt eine Meldung, wenn nichts zu tun ist? (keinen Fehler!)
- [ ] Pizzen verschwinden (erst) beim Bäcker, wenn der Fahrer die entsprechende Bestellung auf *unterwegs* setzt?

- [ ] Die Fahrerseite aktualisiert sich alle 10 Sekunden?
- [ ] Die Fahrerseite zeigt nur (!) die Bestellungen, die bereit für die Auslieferung sind (Default: Birkenweg 7...).
- [ ] Die Fahrerseite zeigt den Gesamtpreis und die Lieferadresse der Bestellung an?
- [ ] Der Fahrer kann den Status einer Bestellung (mit einem Submit-Button) ändern. Die Änderung wird in die Datenbank übernommen? 
- [ ] Die Fahrerseite erzeugt nach einer Auslieferung *keine* Post-Blockade bei Reload (F5 auf Fahrerseite erzeugt kein Popup) (*PRG-Pattern*)?
- [ ] Ausgelieferte Bestellungen verschwinden beim Fahrer?
- [ ] Die Fahrerseite zeigt eine Meldung, wenn keine Lieferung ansteht? (keinen Fehler!)

# Abgabe
- [ ] Die Übersichtsseite erfüllt weitgehend die Kundenanforderungen
- [ ] Die Bestellseite erfüllt weitgehend die Kundenanforderungen
- [ ] Die Kundenseite erfüllt weitgehend die Kundenanforderungen
- [ ] Die Bäckerseite erfüllt weitgehend die Kundenanforderungen
- [ ] Die Fahrerseite erfüllt weitgehend die Kundenanforderungen

# Bemerkungen / Hinweise
- 

# Gesamtergebnis (Ampelskala)
- 
