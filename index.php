<?php

use GuzzleHttp\Client;

$username = 'brsmobileapp';
$password = 'QB6T9vmVw8WcbTZv8bGUJMs2E3SKU4jLBNJscNMZx4hyZdwfcta9ALqS4THXVxw679BFh5FsPEYbSUfHxSmvJVX9Wfm5gCPmterEJTWMzUjt8ej3kLwEbP7CkhLbfVAC8FvaxYDx2KzVvttMDsWxhNzmVqeqvjmVbFSNA2LgkfyDXTSD7XbPpNQRyZQcgzHSRuQVSQ5SZujDYjfm2TnetbP6Dk8gbf7Pae9vWA4kg5Bj84SsshnqMgGTFjPVeYr8';
$URL = 'https://www.brsgolf.com/api/v2/clubs';

require_once "./vendor/autoload.php";

$client = new Client;


$response = $client->request('GET', $URL, [
    'auth' => [
        $username,
        $password
    ]
]);


if (200 == $response->getStatusCode()) {
    $name = $response->getBody();

    $data = json_decode($name);

} else {
    echo 'Fix if statement';
}


$clubData = $data->_results;


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>BRS clubs list</title>
</head>
<body>
<style>
    .fs-4{color: #4086b0;}
</style>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-4">BRS Clubs List</span>
        </a>

    </header>
</div>

<div class="py-5 bg-body-tertiary">
    <div class="container">

        <div class="row cols-row-1 row-cols-sm-2 row-cols-md-3 g-3">
<?php foreach ($clubData as $club):?>



            <div class="col">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                      <?php  echo $club->name;?>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php foreach ($club->address as $addressLine){
                                if ($addressLine != ''){
                                   echo $addressLine. ' , ';
                                }
                            }
                            ?>
                            <?php $uri = 'https://www.brsgolf.com/' . $club->club_id; ?>

                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="btn-group" href="<?= $uri?>">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Visit</button>
                            </a>
                            </div>
                            <small class="text-body-secondary"> <?php echo $club->club_id;?></small>
                        </div>
                    </div>
                </div>




<?php endforeach;?>


    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>


