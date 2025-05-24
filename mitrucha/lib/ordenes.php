<?php

function crearOrden()
{
    return [
        "orderId" => explode(".", gettimeofday(true))[0],
        "cliente" => "",
        "productos" => [],
        "total" => 0
    ];
}
