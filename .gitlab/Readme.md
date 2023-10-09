# Bewertung von Praktika
1. Issues als Checklisten für die Praktika
   
    Im GitLab-Projekt der Studis sind Vorlagen für die Bewertung der einzelnen Praktikumstermine hinterlegt. Wenn man über die Webseite von GitLab auf das Projekt zugreift, kann man ein *Issue* mit einer Vorlage anlegen: In der Leiste auf der linken Seite *Tickets* anklicken und dann ein neues Ticket eröffnen. In dem erscheinenden Fenster kann man dann ein Template auswählen: z.B: CheckListLab_1.
  Diese Issues kann man zur Doku nutzen und kann dann sehen, ob die Studis die Aufgabe im Detail erfüllt haben.
  Die Checkliste enthält vorne immer ein `[ ]`. Wenn man das Leerzeichen in den Klammern durch ein `x` ersetzt, wird es abgehakt.
2. Badges ![](https://img.shields.io/badge/EWA-ist_toll-green)

   Badges bieten die Möglichkeit in der Schnellübersicht von GitLab eine Markierung zu setzen, damit man schnell sieht, ob z.B. das Testat für ein Praktikum erteilt wurde. Damit das bequem geht, gibt es im Ordner `.gitlab/Badges` eine HTML-Seite `Badges.html` mit den Badges für EWA. Wenn man diese Seite im Browser öffnet, kann man den gewünschten Badge durch Anklicken kopieren.
   Dann muss der kopierte Link in GitLab eingefügt werden unter: Einstellungen -> Badges (rechts!). Dort den kopierten Link unter "Link" und unter "Badge-Bild-Url" einfügen und bestätigen.
   Wenn es geklappt hat, sieht man jetzt im Project Overview die gesetzte Markierung. 

   Hinweis: Damit Badges von Betreuern vergeben - aber von Studis nicht geändert - werden können, müssen die Studis in der Rolle "Developer" im GitLab-Projekt eingetragen sein (und die Betreuer als Maintainer oder Owner). Allerdings dürfen die Studis als Developer nicht auf den Master-Branch schreiben. Damit das geht, muss unter Einstellungen->Repository->Protected Branches der Master-Branch herausgenommen werden. 
