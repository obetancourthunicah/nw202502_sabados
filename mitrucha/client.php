<?php
require_once "lib/libreria.php";
$catalogo = obtenerProductos();
$ordenIdActivo = obtenerOrdenActiva();

$orden = null;

if ($ordenIdActivo) {
    $orden = obtenerOrdenPorId($ordenIdActivo);
}

if (isset($_POST["btnCreaOrden"])) {
    $txtCliente = $_POST["txtCliente"];
    // validaciones a realizar al campo txtCLiente

    $orden = crearOrden($txtCliente);
    $ordenIdActivo = $orden["orderId"];
    guardarOrdenActiva($orden["orderId"]);
}

if (isset($_POST["btnAddProduct"])) {
    $codprod = $_POST["codprod"];
    agregarProductoAOrden($ordenIdActivo, $codprod);
    $orden = obtenerOrdenPorId($ordenIdActivo);
}

if (isset($_POST["btnRemoveProduct"])) {
    $codprod = $_POST["codprod"];
    eliminarProductoAOrden($ordenIdActivo, $codprod);
    $orden = obtenerOrdenPorId($ordenIdActivo);
}


/*
        include
        include_once
        require
        require_once
    */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Trucha New Order</title>
    <link rel="stylesheet" href="assets/style.css" />
</head>

<body>
    <header>
        <div>
            <h1>La Trucha New Order</h1>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="truchero.php">Truchero</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <?php if (!$ordenIdActivo) { ?>
            <section>
                <div>
                    <h2>Nueva Orden a Mi Trucha</h2>
                    <form action="client.php" method="post">
                        <label for="txtCliente">Orden a Nombre de:</label>
                        <input
                            type="text"
                            name="txtCliente"
                            required
                            placeholder="Jane Doe"
                            id="txtCliente" />
                        <br />
                        <button type="submit" name="btnCreaOrden">Crear Orden</button>
                    </form>
                </div>
            </section>
        <?php } else { ?>
            <section>
                <div class="productos">
                    <table>
                        <thead>
                            <tr>
                                <th>Cod</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($catalogo as $producto) { ?>
                                <tr>
                                    <td><?php echo $producto["codprod"]; ?></td>
                                    <td><?php echo $producto["dscprod"]; ?></td>
                                    <td class="right"><?php echo $producto["precio"]; ?></td>
                                    <td class="center">
                                        <form action="client.php" method="post">
                                            <input type="hidden" value="<?php echo $producto["codprod"]; ?>" name="codprod" />
                                            <button type="submit" name="btnAddProduct">+</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="orden">
                    <table>
                        <thead>
                            <tr>
                                <th>Cod </th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>&nbsp;</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($orden) {
                                foreach ($orden["productos"] as $producto) { ?>
                                    <tr>
                                        <td><?php echo $producto["codprod"]; ?></td>
                                        <td><?php echo $producto["dscprod"]; ?></td>
                                        <td class="right"><?php echo $producto["cantidad"]; ?></td>
                                        <td class="center">
                                            <form action="client.php" method="post">
                                                <input type="hidden"
                                                    value="<?php echo $producto["codprod"]; ?>"
                                                    name="codprod" />
                                                <button type="submit"
                                                    name="btnAddProduct">+</button>
                                                &nbsp;
                                                <button type="submit"
                                                    name="btnRemoveProduct">-</button>
                                            </form>
                                        </td>
                                        <td class="right">
                                            <?php echo ($producto["subtotal"]); ?>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="right">Total: </td>
                                <td class="right"><?php echo $orden["total"]; ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="right">
                                    <form action="client.php"
                                        method="post">
                                        <input type="hidden"
                                            name="orderID"
                                            value="order_id" />
                                        <button type="submit" name="btnEnviar">
                                            Enviar
                                        </button>
                                        &nbsp;
                                        <button type="submit" name="btnCancelar">
                                            Cancelar
                                        </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </section>
        <?php } ?>
    </main>
    <footer>

    </footer>
</body>

</html>