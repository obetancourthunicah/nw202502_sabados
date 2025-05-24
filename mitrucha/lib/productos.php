<?php

function obtenerProductos()
{
    return getValueByKey("productos");
}
function obtenerProductosInitial()
{
    return [
        [
            "codprod" => "P001",
            "dscprod" => "Burrita de Chorizo",
            "precio"  => 70.0,
            "stock"   => 25
        ],
        [
            "codprod" => "P002",
            "dscprod" => "Coca Cola 16 oz",
            "precio"  => 21,
            "stock"   => 50
        ],
    ];
}

function obtenerProductoPorCodigo($codprod)
{
    $productos = obtenerProductos();
    $producto = null;
    foreach ($productos as $valorIterado) {
        if ($valorIterado["codprod"] === $codprod) {
            $producto = $valorIterado;
            break;
        }
    }
    return $producto;
}
