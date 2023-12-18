<?php
global $conn, $client;
session_start();
require_once 'dbutil.php';
require_once 'google.php';

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $google_oauth = new Google\Service\Oauth2($client);

    $google_account_info = $google_oauth->userinfo->get();

    $email =  $google_account_info->email;
}

if (!isset($_COOKIE['nim']) && !isset($_GET['code'])) header('Location: login.php');

$sql = 'select * from user where nim=?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $_COOKIE['nim']);
$stmt->execute();
$user=$stmt->get_result()->fetch_assoc();

$sql = 'select * from course where user=? and finished=true';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $_COOKIE['nim']);
$stmt->execute();
$khsTerm=$stmt->get_result()->fetch_all();

$sql = 'select * from course where user=?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $_COOKIE['nim']);
$stmt->execute();
$krsTerm=$stmt->get_result()->fetch_all();

if ($user == null) {
    $user["name"] = $google_account_info->name;
    $user["email"] = $google_account_info->email;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <header style="background-color: #aeded5; color: #456443;" class="text-center py-4">
        <h1 class="display-4">SIAKAD</h1>
        <p class="lead">Sistem Informasi Akademik</p>
    </header>

    <div class="container my-4">
        <div class="row">
            <section class="col-md-9">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" id="grades-tab" data-bs-toggle="tab" href="#grades">KHS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="courses-tab" data-bs-toggle="tab" href="#courses">KRS</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="grades">
                            <h2 class="mb-3">Kartu Hasil Studi</h2>
                        <div class="card khs-card">
                            <div class="card-body p-0">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode Kelas</th>
                                            <th scope="col">Kode MK</th>
                                            <th scope="col">Mata Kuliah</th>
                                            <th scope="col">SKS</th>
                                            <th scope="col">Nilai</th>
                                            <th scope="col">Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($krsTerm as $key=>$item) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $item[0] ?></td>
                                                <td><?= $item[7] ?></td>
                                                <td><?= $item[1] ?></td>
                                                <td><?= $item[2] ?></td>
                                                <td><?= $item[4] ?></td>
                                                <td><?= $item[5] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="courses">
                            <h2 class="mb-3">Kartu Rencana Studi</h2>
                        <div class="card krs-card">
                            <div class="card-body p-0">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Kelas</th>
                                        <th scope="col">Kode MK</th>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">SKS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($khsTerm as $key=>$item) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $item[0] ?></td>
                                                <td><?= $item[7] ?></td>
                                                <td><?= $item[1] ?></td>
                                                <td><?= $item[2] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <aside class="col-md-3">
                <h2 class="mb-4">Biodata</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">NAMA</label>
                            <div class="fw-bold"><?php echo $user['name'] ?></div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">Email</label>
                            <div class="fw-bold"><?php echo $user['email'] ?></div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">NIM</label>
                            <div class="fw-bold"><?php echo $user['nim'] ?? '-' ?></div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">tanggal lahir</label>
                            <div class="fw-bold"><?php echo $user['dob'] ?? '-' ?></div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">tempat lahir</label>
                            <div class="fw-bold"><?php echo $user['pob'] ?? '-' ?></div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">no. hp</label>
                            <div class="fw-bold"><?php echo $user['phone'] ?? '-' ?></div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">fakultas</label>
                            <div class="fw-bold"><?php echo $user['faculty'] ?? '-' ?></div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">jurusan</label>
                            <div class="fw-bold"><?php echo $user['major'] ?? '-' ?></div>
                        </div>

                        <div class="mb-2 mt-4">
                            <button class="btn" style="background-color: #aeded5; color: #456443;" onclick="location.href='biodataform.php'">Edit Biodata</button>
                            <button class="btn" style="background-color: #ff8981; color: #860403;" onclick="location.href='logout.php'">Logout</button>
                            <!-- <button class="btn" style="background-color: #ff8981; color: #860403;" onclick="location.href='login.php'">Logout</button> -->
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript) -->
    <script src="mian.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        function selectTerm(term) {
            document.getElementById('termDropdown').innerText = term;
        }
    </script> -->
    <!-- </script> -->
</body>

</html>