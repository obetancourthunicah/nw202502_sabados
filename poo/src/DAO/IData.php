<?php

namespace Nws\DAO;

interface IData
{
    public function Guardar(array $data);
    public function Obtener(): array;
}
