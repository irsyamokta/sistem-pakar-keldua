<?php
include 'function.php';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 0) {
        header("location: indexAdmin.php");
    } else if ($_SESSION['role'] == 2) {
        header("location: indexPakar.php");
    }
}

if (!isset($_SESSION['persentase'])) {
    $_SESSION['persentase'] = [];
}


$gejala = mysqli_query($koneksi, "SELECT * FROM gejala");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="icon/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <title>Ayo Olahraga!</title>
</head>

<body>
    <nav class="navbar py-2 navbar-expand-lg navbar-light">
        <div class="container">
            <h3>Ayo Olahraga.</h3> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a class="btn px-4 btn-primary ml-2" href="logout.php" role="button">Log Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <section class="test mt-5">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <h2 class="mb-4">Pertanyaan : </h2>
                    <form action="" method="post" enctype="multipart/form-data" role="form">
                        <?php
                        $id_penyakit = 1;
                        // if(!isset($_SESSION['id_penyakit'])){
                        //     $_SESSION['id_penyakit'] = $id_penyakit;
                        // }else{
                        //     $id_penyakit = $_SESSION['id_penyakit'];
                        // }
                        $id = gejala($id_penyakit);
                        $id_gejala = intval($id);
                        if (!isset($_SESSION['id_gejala'])) {
                            $_SESSION['id_gejala'] = $id_gejala;
                        } else {
                            $id_gejala = $_SESSION['id_gejala'];
                        }
                        $data = mysqli_query($koneksi, "SELECT gejala FROM gejala WHERE id_gejala = '$id_gejala'");
                        // var_dump($data);
                        $row = mysqli_fetch_assoc($data);
                        ?>
                        <p class="mb-4">
                        <h6>Apakah Anda Ingin membentuk otot <?= $row['gejala']; ?> ?</h6>
                        </p>
                        <?php
                        echo '<input type="submit" class="btn btn-success  mr-2 px-4 py-2" name="ya" value="Ya">';
                        echo '<input type="submit" class="btn btn-danger px-3 py-2" name="tidak" value="Tidak">';
                        $persentase = $_SESSION['persentase'];
                        $temp = 0;
                        $_SESSION['id_gejala'] = $id_gejala;
                        $next_gejala = $_SESSION['id_gejala'];
                        // $next_penyakit = $_SESSION['id_penyakit'];
                        if (isset($_POST['ya'])) {
                            if (isset($id_gejala)) {
                                $temp = $id_gejala;
                                array_push($persentase, $temp);
                            }
                            $_SESSION['persentase'] = $persentase;
                            $next_gejala = $id_gejala + 1;
                            $_SESSION['id_gejala'] = $next_gejala;
                        } else if (isset($_POST['tidak'])) {
                            $next_gejala = $id_gejala + 1;
                            $_SESSION['id_gejala'] = $next_gejala;
                            // $next_penyakit = $id_penyakit += 1;
                            // $_SESSION['id_penyakit'] = $next_penyakit;
                        }
                        if ($_SESSION['id_gejala'] > 7) {

                            $benchPressDada = array(1);
                            $dumbbellFlysDada = array(1);
                            $pushUpsDada = array(1);
                            $pullUpsPunggung = array(2);
                            $latPullDownsPunggung = array(2);
                            $barbellRowsPunggung = array(2);
                            $shoulderPressBahu = array(3);
                            $lateralRaisesBahu = array(3);
                            $bentOverRaisesBahu = array(3);
                            $bicepCurlsLengan = array(4);
                            $tricepDipsLengan = array(4);
                            $tricepExtensionsLengan = array(4);
                            $squatsKaki = array(5);
                            $lungesKaki = array(5);
                            $legPressesKaki = array(5);
                            $calfRaisesBetis = array(6);
                            $seatedCalfRaisesBetis = array(6);
                            $crunchesPerut = array(7);
                            $legRaisesPerut = array(7);
                            $planksPerut = array(7);

                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $benchPressDada)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $BenchPressDada = $nilai / count($benchPressDada);
                            $Dada = number_format($BenchPressDada, 3);
                            $hasilBenchPressDada = $Dada * 100;

                            $_SESSION['benchPressDada'] = $hasilBenchPressDada;


                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $dumbbellFlysDada)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $DumbbellFlysDada = $nilai / count($dumbbellFlysDada);
                            $Dada = number_format($DumbbellFlysDada, 3);
                            $hasilDumbbellFlysDada = $Dada * 100;
                            $_SESSION['dumbbellFlysDada'] = $hasilDumbbellFlysDada;


                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $pushUpsDada)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $PushUpsDada = $nilai / count($pushUpsDada);
                            $Dada = number_format($PushUpsDada, 3);
                            $hasilPushUpsDada = $Dada * 100;
                            $_SESSION['pushUpsDada'] = $hasilPushUps;


                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $pullUpsPunggung)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $PullUpsPunggung = $nilai / count($pullUpsPunggung);
                            $Punggung = number_format($PullUpsPunggung, 3);
                            $hasilPullUpsPunggung = $Punggung * 100;
                            $_SESSION['pullUpsPunggung'] = $hasilPullUpsPunggung;


                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $latPullDownsPunggung)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $LatPullDownsPunggung = $nilai / count($latPullDownsPunggung);
                            $Punggung = number_format($LatPullDownsPunggung, 3);
                            $hasilLatPullDownsPunggung = $Hepatitis * 100;
                            $_SESSION['latPullDownsPunggung'] = $hasilLatPullDownsPunggung;

                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $barbellRowsPunggung)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $BarbellRowsPunggung = $nilai / count($barbellRowsPunggung);
                            $Punggung = number_format($BarbellRowsPunggung, 3);
                            $hasilBarbellRowsPunggung = $Punggung * 100;
                            $_SESSION['barbellRowsPunggung'] = $hasilBarbellRowsPunggung;

                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $shoulderPressBahu)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $ShoulderPressBahu = $nilai / count($shoulderPressBahu);
                            $Bahu = number_format($ShoulderPressBahu, 3);
                            $hasilShoulderPressBahu = $Bahu * 100;
                            $_SESSION['shoulderPressBahu'] = $hasilShoulderPressBahu;

                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $lateralRaisesBahu)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $LateralRaisesBahu = $nilai / count($lateralRaisesBahu);
                            $Bahu = number_format($LateralRaisesBahu, 3);
                            $hasilLateralRaisesBahu = $Bahu * 100;
                            $_SESSION['lateralRaisesBahu'] = $hasilLateralRaisesBahu;

                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $bentOverRaisesBahu)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $BentOverRaisesBahu = $nilai / count($bentOverRaisesBahu);
                            $Bahu = number_format($BentOverRaisesBahu, 3);
                            $hasilBentOverRaisesBahu = $Bahu * 100;
                            $_SESSION['bentOverRaisesBahu'] = $hasilBentOverRaisesBahu;

                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $bicepCurlsLengan)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $BicepCurlsLengan = $nilai / count($bicepCurlsLengan);
                            $Lengan = number_format($BicepCurlsLengan, 3);
                            $hasilBicepCurlsLengan = $Lengan * 100;
                            $_SESSION['bicepCurlsLengan'] = $hasilBicepCurlsLengan;
                            
                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $tricepDipsLengan)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $TricepDipsLengan = $nilai / count($tricepDipsLengan);
                            $Lengan = number_format($TricepDipsLengan, 3);
                            $hasilTricepDipsLengan = $Lengan * 100;
                            $_SESSION['tricepDipsLengan'] = $hasilTricepDipsLengan;

                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $tricepExtensionsLengan)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $TricepExtensionsLengan = $nilai / count($tricepExtensionsLengan);
                            $Lengan = number_format($TricepExtensionsLengan, 3);
                            $hasilTricepExtensionsLengan = $Lengan * 100;

                            $_SESSION['tricepExtensionsLengan'] = $hasilTricepExtensionsLengan;


                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $squatsKaki)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $SquatsKaki = $nilai / count($squatsKaki);
                            $Kaki = number_format($SquatsKaki, 3);
                            $hasilSquatsKaki = $Kaki * 100;
                            $_SESSION['squatsKaki'] = $hasilSquatsKaki;


                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $lungesKaki)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $LungesKaki = $nilai / count($lungesKaki);
                            $Kaki = number_format($LungesKaki, 3);
                            $hasilLungesKaki = $Kaki * 100;
                            $_SESSION['lungesKaki'] = $hasilLungesKaki;


                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $legPressesKaki)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $LegPressesKaki = $nilai / count($legPressesKaki);
                            $Kaki = number_format($LegPressesKaki, 3);
                            $hasilLegPressesKaki = $Kaki * 100;
                            $_SESSION['legPressesKaki'] = $hasilLegPressesKaki;


                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $calfRaisesBetis)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $CalfRaisesBetis = $nilai / count($calfRaisesBetis);
                            $Betis = number_format($CalfRaisesBetis, 3);
                            $hasilCalfRaisesBetis = $Betis * 100;
                            $_SESSION['calfRaisesBetis'] = $hasilCalfRaisesBetis;

                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $seatedCalfRaisesBetis)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $SeatedCalfRaisesBetis = $nilai / count($seatedCalfRaisesBetis);
                            $Betis = number_format($SeatedCalfRaisesBetis, 3);
                            $hasilBarbellRowsPunggung = $Betis * 100;
                            $_SESSION['seatedCalfRaisesBetis'] = $hasilSeatedCalfRaisesBetis;

                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $crunchesPerut)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $CrunchesPerut = $nilai / count($crunchesPerut);
                            $Perut = number_format($CrunchesPerut, 3);
                            $hasilCrunchesPerut = $Perut * 100;
                            $_SESSION['crunchesPerut'] = $hasilCrunchesPerut;

                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $legRaisesPerut)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $LegRaisesPerut = $nilai / count($legRaisesPerut);
                            $Perut = number_format($LegRaisesPerut, 3);
                            $hasilLegRaisesPerut = $Perut * 100;
                            $_SESSION['legRaisesPerut'] = $hasilLegRaisesPerut;


                            $nilai = 0;
                            foreach ($persentase as $value) {
                                if (in_array($value, $bentOverRaisesBahu)) {
                                    $nilai += 1;
                                } else {
                                    $nilai += 0;
                                }
                            }
                            $BentOverRaisesBahu = $nilai / count($planksPerut);
                            $Perut = number_format($PlanksPerut, 3);
                            $hasilPlanksPerut = $Perut * 100;
                            $_SESSION['planksPerut'] = $hasilPlanksPerut;



                            header('Location:hasil.php');
                        }
                        ?>
                        <br>

                </div>
                </form>
                <div class="col d-none d-sm-block">
                    <img width="500" src="gambar/pictor.png" alt="hero" />
                </div>
            </div>
        </div>
    </section>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>