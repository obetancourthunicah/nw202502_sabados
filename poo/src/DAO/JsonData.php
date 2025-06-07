<?php

namespace Nws\DAO;

class JsonData implements IData
{
    private string $fileName;
    private array $data;
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $this->data = array();
    }
    public function Guardar(array $data)
    {
        $file = fopen($this->fileName, "w");
        fwrite($file, json_encode($data, JSON_PRETTY_PRINT));
        fclose($file);
        $this->data = $data;
    }
    public function Obtener(): array
    {
        if (file_exists($this->fileName)) {
            $file = fopen($this->fileName, "r");
            $data = json_decode(
                fread(
                    $file,
                    filesize($this->fileName)
                ),
                true
            );
            $this->data = $data;
        }
        return $this->data;
    }
}
