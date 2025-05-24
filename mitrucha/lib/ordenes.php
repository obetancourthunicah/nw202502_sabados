<?php

function crearOrden()
{
    $orden = [
        "orderId" => explode(".", gettimeofday(true))[0],
        "cliente" => "",
        "productos" => [],
        "total" => 0
    ];
    $ordenes = obtenerOrdenes();
    $ordenes[] = $orden;
    setValueToKey("ordenes", $orden);
}

function obtenerOrdenes()
{
    return getValueByKey("ordenes");
}

function obtenerOrdenPorId($orderId)
{
    $ordenes = obtenerOrdenes();
    $orden = null;
    foreach ($ordenes as $iOrden) {
        if ($iOrden["orderId" == $orderId]) {
            $orden = $iOrden;
            break;
        }
    }
    return $orden;
}
function guardarOrden($orden)
{
    $ordenes = obtenerOrdenes();
    $updated = false;
    foreach ($ordenes as $iOrden) {
        if ($iOrden["orderId"] == $orden["ordernId"]) {
            $updated = true;
            $iOrden = $orden;
            break;
        }
    }
    if (!$updated) {
        $ordenes[] = $orden;
    }
    setValueToKey("ordenes", $ordenes);
}
function agregarProductoAOrden(
    $orderId,
    $codprod
) {
    $orden = obtenerOrdenPorId($orderId);
    if ($orden) {
        $producto = null;
        $inOrder = false;
        foreach ($orden["productos"] as $prod) {
            if ($prod["codprod"] == $codprod) {
                $producto = $prod;
                $inOrder = true;
                $producto["cantidad"] += 1;
                break;
            }
        }
        if (!$inOrder) {
            $producto = obtenerProductoPorCodigo($codprod);
            $producto["cantidad"] = 1;
            $orden["productos"][] = $producto;
        }
    }
    guardarOrden($orden);
}
