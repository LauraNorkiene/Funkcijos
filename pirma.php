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

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Įveskite duomenis</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="data" class="form-label"></label>
                                <textarea name="data" id="data" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-success">Skaičiuoti</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Apskaičiuotas plotas:</div>
                    <div class="card-body">
                        <?php
                        if (isset($_POST['data'])) {
                            $dataS = $_POST['data'];
                            $data = explode(" ", $dataS);
                            //$sting = implode(", ", $data);
                            //print_r($data);
                        }



                        /* $p = 0;
                        $suma = 0;
                        foreach ($data as $temp) {
                            $suma += $temp;
                        };

                        $p = $suma / 2;
                        echo "Perimetras: $p";*/

                        $a = (int)$data[0];
                        $b = (int)$data[1];
                        $c = (int)$data[2];

                        echo "Krastines: $a, $b, $c<br>";

                        $plotas = function ($a, $b, $c) {
                            if (!((($a + $b) > $c) &&
                                (($a + $c) > $b) &&
                                (($b + $c) > $a))) {
                                return "Iš šių kraštinių nesigauna trikampis!";
                            } else {

                                $p = ($a + $b + $c) / 2;
                                echo "Pusperimetris: $p <br>";
                                $z = $p - $a;
                                $x = $p - $b;
                                $q = $p - $c;
                                $multi = $p * $z * $x * $q;
                                $area = sqrt($multi);

                                return "Plotas: " . $area;
                            }
                        };

                        echo  $plotas($a, $b, $c);
                        ?>


                    </div>
                </div>
            </div>
        </div>


</body>

</html>