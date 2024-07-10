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
                    <?php
                    $id_penyakit = 1;
                    $id = gejala($id_penyakit);
                    $id_gejala = intval($id);

                    if (!isset($_SESSION['id_gejala'])) {
                        $_SESSION['id_gejala'] = $id_gejala;
                    }

                    $id_gejala = $_SESSION['id_gejala'];

                    $data = mysqli_query($koneksi, "SELECT gejala FROM gejala WHERE id_gejala = '$id_gejala'");
                    $row = mysqli_fetch_assoc($data);
                    ?>
                    <?php if ($row) : ?>
                        <p class="mb-4">
                        <h6>Apakah Anda ingin membentuk otot <?= $row['gejala']; ?> ?</h6>
                        </p>
                        <form method="POST" action="">
                            <input type="submit" class="btn btn-success mr-2 px-4 py-2" name="ya" value="Ya">
                            <input type="submit" class="btn btn-danger px-3 py-2" name="tidak" value="Tidak">
                        </form>
                    <?php endif; ?>

                    <?php
                    if (!isset($_SESSION['persentase'])) {
                        $_SESSION['persentase'] = [];
                    }

                    $persentase = $_SESSION['persentase'];

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['ya'])) {
                            array_push($persentase, $id_gejala);
                            $_SESSION['persentase'] = $persentase;
                        }

                        $_SESSION['id_gejala'] = $id_gejala + 1;

                        if ($_SESSION['id_gejala'] > 7) {
                            $exercises = [
                                'benchPressDada' => [1],
                                'dumbbellFlysDada' => [1],
                                'pushUpsDada' => [1],
                                'pullUpsPunggung' => [2],
                                'latPullDownsPunggung' => [2],
                                'barbellRowsPunggung' => [2],
                                'shoulderPressBahu' => [3],
                                'lateralRaisesBahu' => [3],
                                'bentOverRaisesBahu' => [3],
                                'bicepCurlsLengan' => [4],
                                'tricepDipsLengan' => [4],
                                'tricepExtensionsLengan' => [4],
                                'squatsKaki' => [5],
                                'lungesKaki' => [5],
                                'legPressesKaki' => [5],
                                'calfRaisesBetis' => [6],
                                'seatedCalfRaisesBetis' => [6],
                                'crunchesPerut' => [7],
                                'legRaisesPerut' => [7],
                                'planksPerut' => [7]
                            ];

                            foreach ($exercises as $exercise => $values) {
                                $nilai = 0;
                                foreach ($persentase as $value) {
                                    if (in_array($value, $values)) {
                                        $nilai += 1;
                                    }
                                }
                                $percentage = ($nilai / count($values)) * 100;
                                $_SESSION[$exercise] = number_format($percentage);
                            }
                            header('Location: hasil.php');
                            exit();
                        } else {
                            header("Location: " . $_SERVER['PHP_SELF']);
                            exit();
                        }
                    }
                    ?>

                </div>
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