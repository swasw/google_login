<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Biodata - Kaisan's Academic Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="text-center py-5" style="background-color: #aeded5; color: #456443;">
        <h1 class="display-4">Edit Biodata</h1>
        <!-- <p class="lead">Update Your Personal Information</p> -->
    </header>

    <div class="container mt-4">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <form action="dashboard.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                    </div>

                    <div class="mb-3">
                        <label for="idNumber" class="form-label">ID Number</label>
                        <input type="text" class="form-control" id="idNumber" placeholder="Your ID Number">
                    </div>

                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob">
                    </div>

                    <div class="mb-3">
                        <label for="pob" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="pob" placeholder="Your Place of Birth">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                    </div>

                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phoneNumber" placeholder="Your Phone Number">
                    </div>

                    <button type="submit" class="btn" style="background-color: #aeded5; color: #456443;">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
