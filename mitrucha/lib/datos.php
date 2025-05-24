<?php

// Manejo de Datos en JSON
$filePath = "trucha.json";
$store = [];
function loadFile()
{
    global $store;
    global $filePath;
    if (!file_exists($filePath)) {
        return false;
    };
    $file = fopen($filePath, "r");
    $content = fread($file, filesize($filePath));
    fclose($file);
    $store = json_decode($content, true);
    return true;
}

function writeFile()
{
    global $store;
    global $filePath;
    $file = fopen($filePath, "w");
    fwrite($file, json_encode($store, JSON_PRETTY_PRINT));
    fclose($file);
    return true;
}

function getValueByKey($key)
{
    global $store;
    if (isset($store[$key])) {
        return $store[$key];
    }
}

function setValueToKey($key, $value, $save = true)
{
    global $store;
    $store[$key] = $value;
    if ($save) {
        writeFile();
    }
}
