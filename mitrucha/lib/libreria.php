<?php
session_start();
require_once "datos.php";
require_once "productos.php";
require_once "ordenes.php";

function init()
{
    global $store;
    if (!loadFile()) {
        setValueToKey(
            "productos",
            obtenerProductosInitial()
        );
        setValueToKey("ordenes", []);
    }
}

init();
