<?php
global $conn;
session_start();
require_once 'dbutil.php';

if (!isset($_COOKIE['nim'])) header('Location: login.php');

$sql = 'select * from user where nim=?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $_COOKIE['nim']);
$stmt->execute();
$user=$stmt->get_result()->fetch_assoc();

$sql = 'select distinct term from course where user=? and finished=true';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $_COOKIE['nim']);
$stmt->execute();
$khsTerm=$stmt->get_result()->fetch_assoc();

$sql = 'select distinct term from course where user=?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $_COOKIE['nim']);
$stmt->execute();
$krsTerm=$stmt->get_result()->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaisan's Academic Page</title>

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
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h2 class="mb-0">Kartu Hasil Studi</h2>
                            <select id="khsTerm" class="form-select" aria-label="Default select example" onchange="khsTermChange()">
                                <option selected>Pilih semester</option>
                                <option value="1">Semester 1</option>
                            </select>
                        </div>
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
                                        <tr>
                                            <td>1</td>
                                            <td>1313746185</td>
                                            <td>4615461647</td>
                                            <td>Matematika Diskrit</td>
                                            <td>3</td>
                                            <td>A</td>
                                            <td>6.8</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Courses Taken Tab -->
                    <div class="tab-pane fade" id="courses">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="mb-0">Kartu Rencana Studi</h2>
                            <select id="krsTerm" class="form-select" aria-label="Default select example" onchange="krsTermChange()">
                                <option selected>Pilih semester</option>
                            </select>
                        </div>
                        <div class="card krs-card">
                            <div class="card-body p-0">
                                <div class="alert alert-info text-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                    </svg>
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                    </svg> -->
                                    <p class="lead mt-3 mb-0">Pilih semester untuk melihat KRS</p>
                                </div>
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
                            <div class="fw-bold"><?php echo $user['nim'] ?></div>
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