<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            td {padding: .3em; border: 1px solid #ccc; text-align: center;}
            .min {font-weight: bold; color: #0c0; background: #cfc}
            .max {font-weight: bold; color: #c00; background: #fcc}
        </style>
    </head>
    <body>

<?php
if ($_POST) {
    $radku = $_POST['radku'];
    $sloupcu = $_POST['sloupcu'];
    $generuj = $_POST['generuj'];
} else {
    $radku = 10;
    $sloupcu = 10;
    $generuj = 999;    
}
?>

        <form method="POST">
            <label for="radku">Počet řádků: </label>
            <input id= "radku" name="radku" type="number" min="1" value="<?= $radku ?>">
            <label for="sloupcu">Počet sloupců: </label>
                <input id= "sloupcu" name="sloupcu" type="number" min="1" value="<?= $sloupcu ?>">
            <label for="generuj">Generuj: </label>
                <select id="generuj" name="generuj">
                    <option value="9"<?php if ($generuj == 9) echo ' selected' ?>>9</option>
                    <option value="99"<?php if ($generuj == 99) echo ' selected' ?>>99</option>
                    <option value="999"<?php if ($generuj == 999) echo ' selected' ?>>999</option>
                </select>
            <input type="submit" value="Nakresli pole">
        </form>
        <br><br>
        
<?php

if ($_POST) {
    
    if ($radku < 1 || $sloupcu < 1) {
        echo '<div class="max">Zadejte počet řádků a počet sloupců!</div>';
        return false;
    }

    // generuji matici

    $matice = [];
    for ($i = 0; $i < $radku; $i++) {
        $matice[$i] = [];
        for ($j = 0; $j < $sloupcu; $j++) {
            $matice[$i][$j] = rand(0, $generuj);
        }
    }

    // hledam min a max hodnotu

    $max = 0;
    $min = $generuj;
    foreach ($matice as $radek) {
        foreach ($radek as $bunka) {
            if ($bunka < $min) $min = $bunka;
            if ($bunka > $max) $max = $bunka;
        }
    }

    // vykresluji matici

    echo '<table>';
    foreach ($matice as $radek) {
        echo '<tr>';
        foreach ($radek as $bunka) {
            if ($bunka == $min){
                echo '<td class="min">' . $bunka . '</td>';
            } elseif ($bunka == $max) {
                echo '<td class="max">' . $bunka . '</td>';
            } else {
                echo '<td>' . $bunka . '</td>';
            }
        }
        echo '</tr>';
    }
    echo '</table>';

    echo '<br>';
    echo 'Minimální hodnota: <strong>' . $min . '</strong><br>';
    echo 'Maximální hodnota: <strong>' . $max . '</strong>';

}

?>

    </body>
</html>