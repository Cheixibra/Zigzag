<?php
$servername= "localhost";
$username = "root";
$password ="root";  
$database="projet00_db";
//Create connection
$connection = new mysqli($servername, $username, $password, $database);


$code = "";
$nom = "";
$description = "";
$budget= "";
$datedebut= "";
$datefin= "";
$statut= "";

$errorMessage="";
$successMessage="";
if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
   

    do{
        if (empty($code) || empty($nom) || empty($description) || empty($budget)|| empty($datedebut)|| empty($datefin)|| empty($statut)) {
            $errorMessage = "TOUS LES CHAMPS SONT OBLIGATOIRES !";
            break;
        }

        //add new client to database
        $sql = "INSERT INTO projet VALUES(null, '$code', '$nom', '$description', '$budget', '$datedebut', '$datefin', '$statut')";
        //"VALUES ('".$code."','". $nom. "', '".$description."' , '" .$budget. "' ) ";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $code = "";
        $nom = "";
        $description = "";
        $budget = "";
        $datedebut = "";
        $datefin = "";
        $statut = ""; 

        $successMessage = "Votre projet a été créé avec succès ! ";

        header("location: /crud/index.php");
        exit;
    } while (false);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Create Project </h2>

         <?php
         if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
         }
         ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Code</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="code" value="<?php echo $code; ?>">

                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nom" value="<?php echo $nom; ?>">

                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description; ?>">

                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Budget</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="budget" value="<?php echo $budget; ?>">

                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date debut</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="datedebut" value="<?php echo $datedebut; ?>">

                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date fin</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="datefin" value="<?php echo $datefin; ?>">

                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Statut</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="statut" value="<?php echo $statut; ?>">

                </div>

            </div>

        <?php
           if (!empty($successMessage)){
            echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6>
                   <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>

            </div>
            ";
          }
        ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>


                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/crud/index.php" role="button">Cancel</a>

                </div>

            </div>

        </form>

    </div>
</body>
</html>