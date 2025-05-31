<?php
require_once "lib/libreria.php";

if (isset($_POST["btnPreparar"])) {
    $orderId = $_POST["orderId"];
    ordenPreparada($orderId);
}

if (isset($_POST["btnEntregar"])) {
    $orderId = $_POST["orderId"];
    ordenEntregada($orderId);
}

$ordenes = obtenerOrdenes();
$ordenesPosteadas = [];
$ordenesPreparadas = [];
$ordenesEntregadas = [];
$ordenesFallidas = [];
$ordenesAbierto = [];
foreach ($ordenes as $orden) {
    switch ($orden["estado"]) {
        case "Abierto":
            $ordenesAbierto[] = $orden;
            break;
        case "Posteado":
            $ordenesPosteadas[] = $orden;
            break;
        case "Preparado":
            $ordenesPreparadas[] = $orden;
            break;
        case "Entregado":
            $ordenesEntregadas[] = $orden;
            break;
        case "Cancelado":
            $ordenesFallidas[] = $orden;
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesa de Ordenes de la Trucha</title>
    <link rel="stylesheet" href="assets/style.css" />
</head>

<body>
    <h1>Mesa de Ordenes de la Trucha<h1>

            <h2>Posteadas</h2>
            <section class="ordenes">
                <?php foreach ($ordenesPosteadas as $ordenP) { ?>
                    <div class="card">
                        <div class="header">
                            <strong>Orden: <?php echo $ordenP["orderId"]; ?></strong><br />
                            <strong>Cliente: <?php echo $ordenP["cliente"]; ?></strong>
                        </div>
                        <div class="body">
                            <?php foreach ($ordenP["productos"] as $prod) { ?>
                                <div>
                                    <span><?php echo $prod["codprod"]; ?></span>
                                    <span><?php echo $prod["dscprod"]; ?></span>
                                    <br>
                                    <span><?php echo $prod["precio"]; ?></span>
                                    <span><?php echo $prod["cantidad"]; ?></span>
                                    <span><?php echo $prod["subtotal"]; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="footer">
                            <strong>Total: <?php echo $ordenP["total"]; ?></strong>
                            <div class="actions">
                                <form action="truchero.php" method="post">
                                    <input type="hidden" value="<?php echo $ordenP["orderId"]; ?>" name="orderId" />
                                    <button type="submit" name="btnPreparar">Preparada</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>

            <h2>Preparadas</h2>
            <section class="ordenes">
                <?php foreach ($ordenesPreparadas as $ordenP) { ?>
                    <div class="card">
                        <div class="header">
                            <strong>Orden: <?php echo $ordenP["orderId"]; ?></strong><br />
                            <strong>Cliente: <?php echo $ordenP["cliente"]; ?></strong>
                        </div>
                        <div class="body">
                            <?php foreach ($ordenP["productos"] as $prod) { ?>
                                <div>
                                    <span><?php echo $prod["codprod"]; ?></span>
                                    <span><?php echo $prod["dscprod"]; ?></span>
                                    <br>
                                    <span><?php echo $prod["precio"]; ?></span>
                                    <span><?php echo $prod["cantidad"]; ?></span>
                                    <span><?php echo $prod["subtotal"]; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="footer">
                            <strong>Total: <?php echo $ordenP["total"]; ?></strong>
                            <div class="actions">
                                <form action="truchero.php" method="post">
                                    <input type="hidden" value="<?php echo $ordenP["orderId"]; ?>" name="orderId" />
                                    <button type="submit" name="btnEntregar">Entragar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>

            <h2>Entregadas</h2>
            <section class="ordenes">
                <?php foreach ($ordenesEntregadas as $ordenP) { ?>
                    <div class="card">
                        <div class="header">
                            <strong>Orden: <?php echo $ordenP["orderId"]; ?></strong><br />
                            <strong>Cliente: <?php echo $ordenP["cliente"]; ?></strong>
                        </div>
                        <div class="body">
                            <?php foreach ($ordenP["productos"] as $prod) { ?>
                                <div>
                                    <span><?php echo $prod["codprod"]; ?></span>
                                    <span><?php echo $prod["dscprod"]; ?></span>
                                    <br>
                                    <span><?php echo $prod["precio"]; ?></span>
                                    <span><?php echo $prod["cantidad"]; ?></span>
                                    <span><?php echo $prod["subtotal"]; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="footer">
                            <strong>Total: <?php echo $ordenP["total"]; ?></strong>
                        </div>
                    </div>
                <?php } ?>
            </section>

            <h2>Canceladas</h2>
            <section class="ordenes">
                <?php foreach ($ordenesFallidas as $ordenP) { ?>
                    <div class="card">
                        <div class="header">
                            <strong>Orden: <?php echo $ordenP["orderId"]; ?></strong><br />
                            <strong>Cliente: <?php echo $ordenP["cliente"]; ?></strong>
                        </div>
                        <div class="body">
                            <?php foreach ($ordenP["productos"] as $prod) { ?>
                                <div>
                                    <span><?php echo $prod["codprod"]; ?></span>
                                    <span><?php echo $prod["dscprod"]; ?></span>
                                    <br>
                                    <span><?php echo $prod["precio"]; ?></span>
                                    <span><?php echo $prod["cantidad"]; ?></span>
                                    <span><?php echo $prod["subtotal"]; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="footer">
                            <strong>Total: <?php echo $ordenP["total"]; ?></strong>
                        </div>
                    </div>
                <?php } ?>
            </section>

            <h2>Abiertas</h2>
            <section class="ordenes">
                <?php foreach ($ordenesAbierto as $ordenP) { ?>
                    <div class="card">
                        <div class="header">
                            <strong>Orden: <?php echo $ordenP["orderId"]; ?></strong><br />
                            <strong>Cliente: <?php echo $ordenP["cliente"]; ?></strong>
                        </div>
                        <div class="body">
                            <?php foreach ($ordenP["productos"] as $prod) { ?>
                                <div>
                                    <span><?php echo $prod["codprod"]; ?></span>
                                    <span><?php echo $prod["dscprod"]; ?></span>
                                    <br>
                                    <span><?php echo $prod["precio"]; ?></span>
                                    <span><?php echo $prod["cantidad"]; ?></span>
                                    <span><?php echo $prod["subtotal"]; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="footer">
                            <strong>Total: <?php echo $ordenP["total"]; ?></strong>
                        </div>
                    </div>
                <?php } ?>
            </section>
</body>

</html>