<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaisan's Academic Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom CSS to remove card outline */
        /* .card {
            border: none;
        } */
    </style>
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
                    <!-- Grades Tab -->
                    <div class="tab-pane fade show active" id="grades">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="mb-0">Kartu Hasil Studi</h2>
                            <div class="dropdown">
                                <button id="termDropdown" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pilih Semester
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="termDropdown">
                                    <li><a class="dropdown-item" href="#">Semester 1</a></li>
                                    <li><a class="dropdown-item" href="#">Semester 2</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
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
                            <div class="dropdown">
                                <button id="termDropdown" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pilih Semester
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="termDropdown">
                                    <li><a class="dropdown-item" href="#">Semester 1</a></li>
                                    <li><a class="dropdown-item" href="#">Semester 2</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-warning text-center" role="alert">
                                <i class="bi bi-exclamation-triangle"></i>
                                    <!-- <img src="https://via.placeholder.com/150" alt="Error Icon" class="img-fluid mb-3"> -->
                                    <p class="lead mb-0">Pilih semester untuk melihat KRS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- <section class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="mb-0">Kartu Hasil Studi</h2>
                    <div class="dropdown">
                        <button id="termDropdown" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pilih Semester
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="termDropdown">
                            <li><a class="dropdown-item" href="#">Semester 1</a></li>
                            <li><a class="dropdown-item" href="#">Semester 2</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
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
            </section> -->

            <aside class="col-md-3">
                <h2 class="mb-4">Biodata</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">Name</label>
                            <div class="fw-bold">Kaisan Tsabit</div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">ID Number</label>
                            <div class="fw-bold">1313622020</div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">Date of Birth</label>
                            <div class="fw-bold">03-10-2003</div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">Place of Birth</label>
                            <div class="fw-bold">Bekasi</div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">Email</label>
                            <div class="fw-bold">ktsabit@gmail.com</div>
                        </div>

                        <div class="mb-2">
                            <label class=" text-uppercase text-muted small">Phone Number</label>
                            <div class="fw-bold">085155488272</div>
                        </div>
                        <!-- <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Name:</strong>Kaisan Tsabit</li>
                            <li class="list-group-item"><strong>ID Number:</strong>1313622020</li>
                            <li class="list-group-item"><strong>Date of Birth:</strong>03/10/2003</li>
                            <li class="list-group-item"><strong>Place of Birth:</strong>Bekasi</li>
                            <li class="list-group-item"><strong>Email:</strong>ktsabit@gmail.com</li>
                            <li class="list-group-item"><strong>Phone Number:</strong>085155488272</li>
                        </ul> -->
                        <div class="mb-2">
                            <button class="btn" style="background-color: #aeded5; color: #456443;" onclick="location.href='biodataform.php'">Edit Biodata</button>
                            <!-- <button class="btn btn-dark me-2" onclick="location.href='edit-biodata.html'">Edit Biodata</button> -->
                            <button class="btn" style="background-color: #ff8981; color: #860403;" onclick="location.href='login.php'">Logout</button>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function selectTerm(term) {
            document.getElementById('termDropdown').innerText = term;
        }
    </script>
    </script>
</body>

</html>