<?php

function definujMatici($radku, $sloupcu, $generuj) {
    $definice_matice = ['radku' => $radku, 'sloupcu' => $sloupcu, 'generuj' => $generuj];
    if ($_POST) {
        if (isset($_POST['radku'])) $definice_matice['radku'] = $_POST['radku'];
        if (isset($_POST['sloupcu'])) $definice_matice['sloupcu'] = $_POST['sloupcu'];
        if (isset($_POST['generuj'])) $definice_matice['generuj'] = $_POST['generuj'];
    }
    return $definice_matice;
}

function zkontrolujFormular() {
    if ($_POST['radku'] < 1 || $_POST['sloupcu'] < 1) {
        return false;
    }
}

function generujMatici($radku, $sloupcu, $generuj) {
    $matice = [];
    for ($i = 0; $i < $radku; $i++) {
        $matice[$i] = [];
        for ($j = 0; $j < $sloupcu; $j++) {
            $matice[$i][$j] = rand(0, $generuj);
        }
    }
    return $matice;
}

function minMax($matice) {
    $min = PHP_INT_MAX;
    $max = PHP_INT_MIN;
    foreach ($matice as $radek) {
        if (min($radek) < $min) $min = min($radek);
        if (max($radek) > $max) $max = max($radek);
    }
    return $min_max = ['min' => $min, 'max' => $max];
}

function vykresliMatici($matice, $min, $max) {
    echo '<article>';
    echo '<table>';
    foreach ($matice as $radek) {
        echo '<tr>';
        foreach ($radek as $bunka) {
            if ($bunka == $min) {
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
    echo '</article>';
}