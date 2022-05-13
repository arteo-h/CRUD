<?php
require_once("../crude/php/component.php");
require_once("../crude/php/operation.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grades</title>

    <script src="https://kit.fontawesome.com/b4d0f47da3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>

        body{
            margin: 0;
            padding: 0;
            background: url("foto.jpg");
            background-size: cover;
        }

        .d-flex button{
            margin: 2.5em 2.2em;
            padding: 0.5em 2.4em;
        }

        .d-flex table{
            margin: 2em 5em;
        }

        table .btnedit{
            color: blue;
            cursor: pointer;
        }

        .success {
            background-color: green;
            padding: 1em;
        }

        .error{
            background-color: red;
            padding: 1em;
        }
    </style>
</head>
<body>

<main>
    <div class="container text-center">
        <h1 class="py-4 bg-primary text-light rounded">Interim Grades</h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("Web Grade", "web", "");?>
                </div>
                <div class="pt-2">
                    <?php inputElement("Finance Grade", "finance", "");?>
                </div>
                <div class="row pt-2">
                        <?php inputElement("Network Grade", "network", "");?>
                    <div class="col pt-2">
                        <?php inputElement("Internship Grade", "intern", "");?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create","dat-toggle='tooltip' data-placement='bottom' title='Create'" );?>
                    <?php buttonElement("btn-refresh", "btn btn-info", "<i class='fas fa-sync'></i>", "refresh","dat-toggle='tooltip' data-placement='bottom' title='Refresh'" );?>
                    <?php buttonElement("btn-update", "btn btn-dark border", "<i class='fas fa-pen-alt'></i>", "update","dat-toggle='tooltip' data-placement='bottom' title='Update'" );?>
                    <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>", "delete","dat-toggle='tooltip' data-placement='bottom' title='Delete'" );?>
                <?php deleteBtn(); ?>
                </div>
            </form>
        </div>

        <div class="d-flex table-data">
            <table class="table table-striped table-primary">
                <thead class="thead-info">
                <tr>
                    <th>WEB TECH</th>
                    <th>FINANCE</th>
                    <th>NETWORK</th>
                    <th>INTERNSHIP</th>
                    <th>EDIT</th>
                </tr>
                </thead>
                <tbody id="tbody">
<?php
                if (isset($_POST['refresh'])){
                $result = getData();
                if ($result){
                    while($row = mysqli_fetch_assoc($result)){?>
                        <tr>
                            <td data-id="<?php echo  $row['web']; ?>"><?php echo  $row['web'];?></td>
                            <td data-id="<?php echo  $row['web']; ?>"><?php echo  $row['finance'];?></td>
                            <td data-id="<?php echo  $row['web']; ?>"><?php echo  $row['network'];?></td>
                            <td data-id="<?php echo  $row['web']; ?>"><?php echo '$'. $row['intern'];?></td>
                            <td><i class="fas fa-edit btnedit" data-id="<?php echo  $row['web']; ?>"></i></td>
                        </tr>
                        <?php
                    }
                }
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="../crude/php/main.js"></script>
</body>
</html>
