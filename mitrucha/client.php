<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Trucha New Order</title>
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <form action="client.php" method="post">
                                    <input type="hidden"
                                        value="codigo_producto"
                                        name="codprod" />
                                    <button type="submit"
                                        name="btnAddProduct">+</button>
                                </form>
                            </td>
                        </tr>
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <form action="client.php" method="post">
                                    <input type="hidden"
                                        value="codigo_producto"
                                        name="codprod" />
                                    <button type="submit"
                                        name="btnAddProduct">+</button>
                                    &nbsp;
                                    <button type="submit"
                                        name="btnRemoveProduct">-</button>
                                </form>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <footer>

    </footer>
</body>

</html>