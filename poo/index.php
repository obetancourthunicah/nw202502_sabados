<?php

require_once 'vendor/autoload.php';

session_start();

$helloInstance = new Nws\About();

$jsonStore = new Nws\DAO\JsonData("productos.json");
//$sessionStore = new Nws\DAO\SessionData("productos");

$productos = new Nws\Productos\Productos($jsonStore);
//$productos = new Nws\Productos\Productos($sessionStore);

$productoA = new \Nws\Productos\DTO\Producto();
$productoA->SKU = "002";
$productoA->Descripcion = "Segundo Producto";
$productoA->Precio = 100.34;

//$productos->addProducto($productoA);

print_r($productos->getProductos());
