<?php
// Beispiel zur Sessionverwaltung mit Login

session_start();

// Abmeldung
define("SessionTimeout", "3600");    // Session wird nach 3600 Sekunden (= 1 Stunde) Inaktivität geschlossen
if (isset($_GET['Logout']) ||
    (isset($_SESSION['LastAccess']) &&
        time() - $_SESSION['LastAccess'] > SessionTimeout)) {
    unset($_SESSION['Username']);                // Zustandsvariable löschen
    setcookie(session_name(), '', 1, '/');        // verfällt am 1.1.1970, d.h. altes Session-Cookie löschen
    header('Location: ' . $_SERVER['PHP_SELF']);    // Login-Seite anbieten
    exit(0);                                    // Skriptausführung beenden
}

// Anmeldung auswerten
$Message = "";
if (isset($_POST['Username']) && isset($_POST['Password'])) {
    // Login-Formular wurde abgeschickt
    $queryWebserviceOBS = $obsWebservice . 'service=Authenticate&loginUser=' . urlencode($_POST['Username']) . '&loginPass=' . urlencode($_POST['Password']);
    $authResult = file_get_contents($queryWebserviceOBS);
    if (isValidUser($_POST['Username'], $_POST['Password'])) {    // Zugriff auf die Datenbank
        $_SESSION['Username'] = $_POST['Username'];
        $_SESSION['Warenkorb'] = array();                        // persistente Variable initialisieren
    } else
        $Message = "Ungültiger Benutzername oder ungültiges Passwort";
}

// Anmeldung anbieten
if (!isset($_SESSION['Username'])) {
    // noch nicht angemeldet
    generateHeader();
    if ($Message)
        echo "<p>$Message</p>\n";
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="Username">Benutzername</label>
        <input type="text" id="Username" name="Username" value="<?php echo $_POST['Username']; ?>"/><br/>
        <label for="Password">Passwort</label>
        <input type="password" id="Password" name="Password"/><br/>
        <input type="submit" value="Login"/>
    </form>
    <?php
    generateFooter();
    exit(0);
}


// nun können die Seiten innerhalb der Session ("Nutzinhalt") generiert und ausgewertet werden:

// zur Überwachung von Inaktivität:
$_SESSION['LastAccess'] = time();    // Sekunden seit 1.1.1970; Überlauf 19.01.2038

// auf allen Seiten einen Link zum Ausloggen:
echo '<a href="' . $_SERVER['PHP_SELF'] . '?Logout=true">Logout</a>';


// Zugriff auf Variable, die innerhalb der Session persistent sind
// ($_SESSION geht nicht an den Client und ist damit vor Manipulationen geschützt):

$_SESSION['Warenkorb'][] = "Pizza Funghi";            // auf einer Seite füllen

for ($i = 0; $i < count($_SESSION['Warenkorb']); $i++)
    echo $_SESSION['Warenkorb'][$i];                // auf einer anderen Seite zur Kontrolle anzeigen


// alle benutzerbezogenen Datenbank-Zugriffe unter dieser Bedingung:
$_SESSION_Username = $mysqli->real_escape_string($_SESSION['Username']);
$SQL = "... WHERE username='$_SESSION_Username' ...";

/*** Dummy-Methoden definieren ***/
function isValidUser(string $user, string $pwd): bool
{
    return true;
}

function generateHeader()
{
}

function generateFooter()
{
}