<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['role'] == 0) {
    header("location: indexAdmin.php");
} else if ($_SESSION['role'] == 2) {
    header("location: indexPakar.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="icon/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <title>Hasil Diagnosa</title>
</head>

<body>
    <nav class="navbar py-2 navbar-expand-lg navbar-light">
        <div class="container">
            <h3>Hasil Diagnosa.</h3> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

    <section class="hasil mt-5">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <h2 class="mb-4">Hasil Diagnosa : </h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Jenis Latihan</th>
                                <th>Persentase Kecocokan (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bench Press (Dada)</td>
                                <td><?php echo $_SESSION['benchPress']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Dumbbell Flys (Dada)</td>
                                <td><?php echo $_SESSION['dumbbellFlysDada']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Push Ups (Dada)</td>
                                <td><?php echo $_SESSION['pushUpsDada']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Pull Ups (Punggung)</td>
                                <td><?php echo $_SESSION['pullUpsPunggung']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Lat Pull Downs (Punggung)</td>
                                <td><?php echo $_SESSION['latPullDownsPunggung']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Barbell Rows (Punggung)</td>
                                <td><?php echo $_SESSION['barbellRowsPunggung']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Shoulder Press (Bahu)</td>
                                <td><?php echo $_SESSION['shoulderPressBahu']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Lateral Raises (Bahu)</td>
                                <td><?php echo $_SESSION['lateralRaisesBahu']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Bent Over Raises (Bahu)</td>
                                <td><?php echo $_SESSION['bentOverRaisesBahu']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Bicep Curls (Lengan)</td>
                                <td><?php echo $_SESSION['bicepCurlsLengan']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Tricep Dips (Lengan)</td>
                                <td><?php echo $_SESSION['tricepDipsLengan']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Tricep Extensions (Lengan)</td>
                                <td><?php echo $_SESSION['tricepExtensionsLengan']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Squats (Kaki)</td>
                                <td><?php echo $_SESSION['squatsKaki']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Lunges (Kaki)</td>
                                <td><?php echo $_SESSION['lungesKaki']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Leg Presses (Kaki)</td>
                                <td><?php echo $_SESSION['legPressesKaki']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Calf Raises (Betis)</td>
                                <td><?php echo $_SESSION['calfRaisesBetis']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Seated Calf Raises (Betis)</td>
                                <td><?php echo $_SESSION['seatedCalfRaisesBetis']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Crunches (Perut)</td>
                                <td><?php echo $_SESSION['crunchesPerut']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Leg Raises (Perut)</td>
                                <td><?php echo $_SESSION['legRaisesPerut']; ?>%</td>
                            </tr>
                            <tr>
                                <td>Planks (Perut)</td>
                                <td><?php echo $_SESSION['planksPerut']; ?>%</td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="index.php">Kembali</a>
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
