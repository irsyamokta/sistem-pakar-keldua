<?php 
include 'function.php';

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 0) {
        header("location: indexAdmin.php");
    } else if ($_SESSION['role'] == 2) {
        header("location: indexPakar.php");
    }
} else {
    header("location:index.php");
}

$gejala = mysqli_query($koneksi, "SELECT * FROM gejala");

function maximum($values) {
    $max = $values[0];
    $kode = 1;
    foreach ($values as $index => $value) {
        if ($value > $max) {
            $max = $value;
            $kode = $index + 1;
        }
    }
    return $kode;
}

$exercises = [
    ["type" => "Dada", "name" => "Bench Press", "value" => $_SESSION['benchPressDada']],
    ["type" => "Dada", "name" => "Dumbbell Flys", "value" => $_SESSION['dumbbellFlysDada']],
    ["type" => "Dada", "name" => "Push-Ups", "value" => $_SESSION['pushUpsDada']],
    ["type" => "Punggung", "name" => "Pull-Ups", "value" => $_SESSION['pullUpsPunggung']],
    ["type" => "Punggung", "name" => "Lat Pull-Downs", "value" => $_SESSION['latPullDownsPunggung']],
    ["type" => "Punggung", "name" => "Barbell Rows", "value" => $_SESSION['barbellRowsPunggung']],
    ["type" => "Bahu", "name" => "Shoulder Press", "value" => $_SESSION['shoulderPressBahu']],
    ["type" => "Bahu", "name" => "Lateral Raises", "value" => $_SESSION['lateralRaisesBahu']],
    ["type" => "Bahu", "name" => "Bent-Over Raises", "value" => $_SESSION['bentOverRaisesBahu']],
    ["type" => "Lengan", "name" => "Bicep Curls", "value" => $_SESSION['bicepCurlsLengan']],
    ["type" => "Lengan", "name" => "Tricep Dips", "value" => $_SESSION['tricepDipsLengan']],
    ["type" => "Lengan", "name" => "Tricep Extensions", "value" => $_SESSION['tricepExtensionsLengan']],
    ["type" => "Kaki", "name" => "Squats", "value" => $_SESSION['squatsKaki']],
    ["type" => "Kaki", "name" => "Lunges", "value" => $_SESSION['lungesKaki']],
    ["type" => "Kaki", "name" => "Leg Presses", "value" => $_SESSION['legPressesKaki']],
    ["type" => "Betis", "name" => "Calf Raises", "value" => $_SESSION['calfRaisesBetis']],
    ["type" => "Betis", "name" => "Seated Calf Raises", "value" => $_SESSION['seatedCalfRaisesBetis']],
    ["type" => "Perut", "name" => "Crunches", "value" => $_SESSION['crunchesPerut']],
    ["type" => "Perut", "name" => "Leg Raises", "value" => $_SESSION['legRaisesPerut']],
    ["type" => "Perut", "name" => "Planks", "value" => $_SESSION['planksPerut']],
];

$values = array_column($exercises, 'value');
$id_penyakit = maximum($values);

$query = "SELECT * FROM solusi WHERE id_penyakit = '$id_penyakit'";
$data = mysqli_query($koneksi, $query);
$solusi = [];
while ($row = mysqli_fetch_array($data)) {
    $solusi[] = $row['solusi'];
}

$filtered_exercises = array_filter($exercises, function($exercise) {
    return $exercise['value'] > 0;
});
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
            <a class="navbar-brand" href="#">
            <img src="gambar/logo.png" width="147" alt="logo"
            /></a>
            <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a class="btn px-2 py-2 btn-success ml-2" href="function.php?act=ulang" role="button">Cek Ulang</a>
                    </li>
                    <li>
                        <a class="btn px-2 py-2 btn-primary ml-2" href="logout.php" role="button"
                    >Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hasil mt-4">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <h3 class="mb-4">Hasil Diagnosis Anda :</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Jenis Bagian Tubuh</th>
                                <th>Latihan</th>
                                <th>Persentase</th>
                                <th>Solusi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($filtered_exercises as $index => $exercise) {
                                echo "<tr>";
                                echo "<td>{$exercise['type']}</td>";
                                echo "<td>{$exercise['name']}</td>";
                                echo "<td>{$exercise['value']}%</td>";
                                if ($index == 0) { // Show solusi only for the first exercise row
                                    echo "<td rowspan=\"" . count($filtered_exercises) . "\">";
                                    foreach ($solusi as $s) {
                                        echo "<p>{$s}</p>";
                                    }
                                    echo "</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col d-none d-sm-block">
                <img width="450" src="gambar/pictor.png" alt="hero" />
                </div>
            </div>
        </div>
    </section>
</body>

<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"
></script>
<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"
></script>
</html>
