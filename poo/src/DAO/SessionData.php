<?php

namespace Nws\DAO;

use Exception;

class SessionData implements IData
{
    private string $dataKey;

    public function __construct(string $dataKey)
    {
        if (!isset($_SESSION)) {
            throw new Exception("Debe iniciar session con session_start");
        }
        $this->dataKey = $dataKey;
    }

    public function Guardar(array $data)
    {
        $_SESSION[$this->dataKey] = $data;
    }
    public function Obtener(): array
    {
        $data = [];
        if (isset($_SESSION[$this->dataKey])) {
            $data = $_SESSION[$this->dataKey];
        }
        return $data;
    }
}
