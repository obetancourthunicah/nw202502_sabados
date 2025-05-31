<?php

function crearOrden($cliente)
{
    $orden = [
        "orderId" => explode(".", gettimeofday(true))[0],
        "cliente" => $cliente,
        "productos" => [],
        "total" => 0
    ];
    $ordenes = obtenerOrdenes();
    $ordenes[] = $orden;
    setValueToKey("ordenes", $ordenes);
    return $orden;
}

function obtenerOrdenActiva()
{
    if (isset($_SESSION["ordenActiva"])) {
        return $_SESSION["ordenActiva"];
    }
    return null;
}

function guardarOrdenActiva($codigo)
{
    $_SESSION["ordenActiva"] = $codigo;
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
        if ($iOrden["orderId"] == $orderId) {
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
    $newOrdenes = [];
    foreach ($ordenes as $iOrden) {
        if ($iOrden["orderId"] == $orden["orderId"]) {
            $updated = true;
            $newOrdenes[] = $orden;
        } else {
            $newOrdenes[] = $iOrden;
        }
    }
    if (!$updated) {
        $newOrdenes[] = $orden;
    }
    setValueToKey("ordenes", $newOrdenes);
}
function agregarProductoAOrden(
    $orderId,
    $codprod
) {
    $orden = obtenerOrdenPorId($orderId);
    if ($orden) {
        $producto = null;
        $inOrder = false;
        $newProductoArray = [];
        foreach ($orden["productos"] as $prod) {
            if ($prod["codprod"] == $codprod) {
                $producto = $prod;
                $producto["cantidad"] += 1;
                $producto["subtotal"] = $producto["cantidad"] * $producto["precio"];
                $newProductoArray[] = $producto;
                $inOrder = true;
            } else {
                $newProductoArray[] = $prod;
            }
        }
        $orden["productos"] = $newProductoArray;
        if (!$inOrder) {
            $producto = obtenerProductoPorCodigo($codprod);
            $producto["cantidad"] = 1;
            $producto["subtotal"] = $producto["precio"];
            $orden["productos"][] = $producto;
        }
        $total = 0;
        foreach ($orden["productos"] as $prod) {
            $total += $prod["subtotal"];
        }
        $orden["total"] = $total;
    }
    guardarOrden($orden);
}

function eliminarProductoAOrden(
    $orderId,
    $codprod
) {
    $orden = obtenerOrdenPorId($orderId);
    if ($orden) {
        $producto = null;
        $newProductoArray = [];
        foreach ($orden["productos"] as $prod) {
            if ($prod["codprod"] == $codprod) {
                $producto = $prod;
                $producto["cantidad"] -= 1;
                $producto["subtotal"] = $producto["cantidad"] * $producto["precio"];
                if ($producto["cantidad"] > 0) {
                    $newProductoArray[] = $producto;
                }
            } else {
                $newProductoArray[] = $prod;
            }
        }
        $orden["productos"] = $newProductoArray;
        $total = 0;
        foreach ($orden["productos"] as $prod) {
            $total += $prod["subtotal"];
        }
        $orden["total"] = $total;
    }
    guardarOrden($orden);
}
