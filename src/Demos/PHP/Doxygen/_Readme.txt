Erzeugung der RTF-Doku:

In der Docker-Console:
docker exec -it EWA_Apache bash -c "cd /var/www/html/Demos/PHP/Seitenklassen; doxygen ../Doxygen/_doxygenConfig.cfg; mv _generated/refman.rtf _generated/EWA_PageTemplates.rtf; cp -r _generated ../Doxygen; rm -rf ./_generated"

Das RTF öffnen (!!! Am Anfang ist es optisch leer!!!)
eventuell Seiten löschen
komplett markieren und mit (mehrfach) F9 aktualisieren
PDF exportieren
Zu den Seitenklassen kopieren!