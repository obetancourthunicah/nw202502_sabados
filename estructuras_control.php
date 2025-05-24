<?php
$txtNombre = "";
$txtResultado = "";

if (isset($_POST["btnEnviar"])) {
    $txtNombre = $_POST["txtNombre"];
    // TODO VALOR QUE VIENE DE UN FORMULARIO HTML >>>ES TEXTO<<<
    $txtResultado = "Bienvenido " . $txtNombre;
}/* elseif () {

} else {

}
*/
$txtCaso = "PRC";
switch ($txtCaso) {
    case "PRC":
        error_log("Entro con valor " . $txtCaso);
        // expresiones
        break;
    case "DEL":
        break;
    case "UPD":
        break;
    case "INS":
        break;
    default:
        break;
}

// Condiciones Ternarias
$isOfAge = false;
$hasAccess = ($isOfAge) ? true : false;

$txtNumeroOperador1 = "100";
$intNumero = intval($txtNumeroOperador1);
$fltNumer = floatval($txtNumeroOperador1);

/// Ciclos
for ($i = 0; $i < 100; $i++) {
}
$i = 0;
while ($i < 100) {
    // expresiones
    $i++;
}


$j = 0;
do {
    //expresiones
} while ($j < 0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Registro de Nombre</h1>
    <form action="estructuras_control.php" method="post">
        <div>
            <label for="txtNombre">Nombre: </label>
            <input
                name="txtNombre"
                id="txtNombre"
                placeholder="eg. John Doe"
                type="text" />
        </div>
        <div>
            <label for="txtNombre">Nombre: </label>
            <input
                name="txtNombre"
                id="txtNombre"
                placeholder="eg. John Doe"
                type="text" />
        </div>
        <div>
            <label for="txtNombre">Nombre: </label>
            <input
                name="txtNombre"
                id="txtNombre"
                placeholder="eg. John Doe"
                type="text" />
        </div>
        <button type="submit" name="btnEnviar">Enviar</button>
    </form>
    <?php if ($txtResultado !== "") { ?>
        <section>
            <?php echo $txtResultado; ?>
        </section>
    <?php } ?>
</body>

</html>