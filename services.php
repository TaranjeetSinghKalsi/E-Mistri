<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Services</title>
    <link rel="stylesheet" href="service.css">

</head>

<body>

    <section id="title">
        
        <div class="container-fluid">
            <div class="card-body" id="center">
                <form action="" method="GET">
                    <div class="row">

                        <div class="col-2">
                            <a class="navbar-brand" href="/"><img style=" width: 150px;" src="images/logo.png" alt=""></a>
                        </div>

                        <div class="col-3">
                            <select class="form-select" aria-label="Default select example" name="search" id="profession" value="<?php if (isset($_GET['search'])) {
                                                                                                                                        echo $_GET['search'];
                                                                                                                                    } ?>">
                                <option selected>Select Profession</option>
                                <option value="Electrician">Electrician</option>
                                <option value="Plumber">Plumber</option>
                                <option value="Carpenter">Carpenter</option>
                                <option value="Painter">Painter</option>
                                <option value="Auto Mechanic">Auto Mechanic</option>
                                <option value="Appliance Repair">Appliance Repair</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <select class="form-select" id="address" name="address" aria-label="Default select example" value="<?php if (isset($_GET['address'])) {
                                                                                                                                        echo $_GET['address'];
                                                                                                                                    } ?>" required>
                                    <option selected>Select Address</option>
                                    <option value="Adhartal">Adhartal</option>
                                    <option value="Barela">Barela</option>
                                    <option value="Bargi">Bargi</option>
                                    <option value="Bheraghat">Bheraghat</option>
                                    <option value="Bilhari">Bilhari</option>
                                    <option value="Civil Lines">Civil Lines </option>
                                    <option value="Garha">Garha </option>
                                    <option value="Gwarighat">Gwarighat</option>
                                    <option value="Hathital">Hathital</option>
                                    <option value="High Court">High Court </option>
                                    <option value="Karmeta">Karmeta</option>
                                    <option value="Medical College">Medical College </option>
                                    <option value="Napier Town">Napier Town </option>
                                    <option value="Patan">Patan </option>
                                    <option value="Piparia">Piparia</option>
                                    <option value="Prem Nagar">Prem Nagar </option>
                                    <option value="Ranjhi">Ranjhi </option>
                                    <option value="Shobhapur">Shobhapur</option>
                                    <option value="Tilwara Ghat">Tilwara Ghat </option>
                                    <option value="Vijay Nagar">Vijay Nagar</option>
                                    <option value="Wright Town">Wright Town </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <button type="submit" id="search" class="btn btn-primary">Search</button>
                        </div>


                    </div>
                </form>
            </div>


            <div class="row">

                <?php
                $con = mysqli_connect("sql201.epizy.com", "epiz_31350798", "3gAZQsWUMu7B2l", "epiz_31350798_emistri");

                if (isset($_GET['search']) && isset($_GET['address'])) {
                    $filtervalues1 = $_GET['search'];
                    $filtervalues2 = $_GET['address'];

                    $query = "SELECT * FROM register WHERE profession LIKE '%$filtervalues1%' AND address LIKE '%$filtervalues2%';  ";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $items) {
                ?>

                            <div class="col-lg-3 features-section ">
                                <div class="card" style="width: 300px;">
                                    <div class="card-body custom-card">
                                        <h5 class="card-title"><?= $items['username']; ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?= $items['profession']; ?> </h6>

                                        <p class="card-text">Lives Near: <strong> <?= $items['address']; ?> </strong> </p>

                                        <a href="tel:<?= $items['phone']; ?>" class="card-link btn btn-outline-success">Call Now</a>

                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                    } else {
                        ?>
                        <table>
                            <tr>
                                <td colspan="4">No Record Found</td>
                            </tr>
                        </table>
                <?php
                    }
                }
                ?>
            </div>
        </div>
       
    </section>



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        document.getElementById('profession').value = "<?php echo $_GET['search']; ?>";
    </script>
</body>

</html>