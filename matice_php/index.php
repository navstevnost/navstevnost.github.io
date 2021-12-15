<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hledání maxima a minima v dvourozměrném poli</title>
        <link rel='stylesheet' href='style.css' type='text/css'>
    </head>
    <body>

    <header>
      <h1>Hledání maxima a minima v dvourozměrném poli</h1>
    </header>

<?php
require_once './matice.php';
$definiceMatice = definujMatici(10, 10, 999);
?>

        <nav class="pozadi">
            <form method="POST">
                <label for="radku">Počet řádků: </label>
                    <input id= "radku" name="radku" type="number" min="1" value="<?= htmlspecialchars($definiceMatice['radku']) ?>" onchange="this.form.submit()">
                <label for="sloupcu">Počet sloupců: </label>
                    <input id= "sloupcu" name="sloupcu" type="number" min="1" value="<?= htmlspecialchars($definiceMatice['sloupcu']) ?>" onchange="this.form.submit()">
                <label for="generuj">Generuj: </label>
                    <select id="generuj" name="generuj" onchange="this.form.submit()">
                        <option value="9"<?php if ($definiceMatice['generuj'] == 9) echo ' selected' ?>>9</option>
                        <option value="99"<?php if ($definiceMatice['generuj'] == 99) echo ' selected' ?>>99</option>
                        <option value="999"<?php if ($definiceMatice['generuj'] == 999) echo ' selected' ?>>999</option>
                    </select>
                <input type="submit" value="Vykresli matici">
            </form>
        </nav>

<?php
if ($_POST) {    
    if (zkontrolujFormular() === false) return false;
    $matice = generujMatici($definiceMatice['radku'], $definiceMatice['sloupcu'], $definiceMatice['generuj']);
    $min_max = minMax($matice);
    $tabulka = vykresliMatici($matice, $min_max['min'], $min_max['max']);
    echo '<footer class="pozadi">Minimální hodnota: <strong>' . $min_max['min'] . '</strong><br>Maximální hodnota: <strong>' . $min_max['max'] . '</strong></footer>';
}
?>            

        


    </body>
</html>