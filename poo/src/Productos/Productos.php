<?php

namespace Nws\Productos;

use Nws\DAO\IData;
use Nws\Productos\DTO\Producto;

class Productos
{
    private array $productos;
    private IData $store;

    public function __construct(IData $store)
    {
        $this->store = $store;
        $this->productos = $this->store->Obtener();
    }

    public function getProductos()
    {
        return $this->productos;
    }
    public function addProducto(Producto $newProducto)
    {
        $this->productos[] = $newProducto;
        $this->store->Guardar($this->productos);
    }
}
