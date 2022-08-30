<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funkcijos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">Skelbimai:</div>
                <div class="card-body">
                    <?php include "skelbimai.php"; ?>
                    <?php

                    $d = $_GET['d'];

                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <?php if ($d == "ASC") { ?>
                                        <a href="antra.php?orderBy=id&d=DESC"> ID &uparrow;</a>
                                    <?php } else { ?>
                                        <a href="antra.php?orderBy=id&d=ASC"> ID &downarrow;</a>
                                    <?php } ?>
                                </th>

                                <th>
                                    <?php if ($d == "ASC") { ?>
                                        <a href="antra.php?orderBy=text&d=DESC"> Skelbimo tekstas &uparrow;</a>
                                    <?php } else { ?>
                                        <a href="antra.php?orderBy=text&d=ASC"> Skelbimo tekstas &downarrow;</a>
                                    <?php } ?>
                                </th>
                                <th>
                                    <?php if ($d == "ASC") { ?>
                                        <a href="antra.php?orderBy=cost&d=DESC"> Kaina &uparrow;</a>
                                    <?php } else { ?>
                                        <a href="antra.php?orderBy=cost&d=ASC"> Kaina &downarrow;</a>
                                    <?php } ?>
                                </th>

                                <th>
                                    <?php if ($d == "ASC") { ?>
                                        <a href="antra.php?orderBy=onPay&d=DESC"> Apmoketa &uparrow;</a>
                                    <?php } else { ?>
                                        <a href="antra.php?orderBy=onPay&d=ASC"> Apmoketa &downarrow;</a>
                                    <?php } ?>
                                </th>
                                <?php

                                if (isset($_GET['orderBy'])) {
                                    $d = $_GET['d'];
                                    $order = $_GET['orderBy'];
                                }
                                usort($skelbimai, function ($a, $b) use ($order) {
                                    global $d;
                                    if ($d == 'DESC') {
                                        return $b[$order] <=> $a[$order];
                                    } else if ($d == 'ASC') {
                                        return $a[$order] <=> $b[$order];
                                    }
                                });
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($skelbimai as $skelbimai) { ?>
                                <tr>
                                    <td><?= $skelbimai['id'] ?></td>
                                    <td><?= $skelbimai['text'] ?></td>
                                    <td><?= $skelbimai['cost'] ?></td>
                                    <td><?php
                                        if ($skelbimai['onPay'] > 0) {
                                            echo date("j, n, Y", $skelbimai['onPay']);
                                        } else {
                                            echo "Neapmokėta";
                                        }
                                        ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>