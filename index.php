<?php
$username='brsmobileapp';
$password='QB6T9vmVw8WcbTZv8bGUJMs2E3SKU4jLBNJscNMZx4hyZdwfcta9ALqS4THXVxw679BFh5FsPEYbSUfHxSmvJVX9Wfm5gCPmterEJTWMzUjt8ej3kLwEbP7CkhLbfVAC8FvaxYDx2KzVvttMDsWxhNzmVqeqvjmVbFSNA2LgkfyDXTSD7XbPpNQRyZQcgzHSRuQVSQ5SZujDYjfm2TnetbP6Dk8gbf7Pae9vWA4kg5Bj84SsshnqMgGTFjPVeYr8';
$URL='https://www.brsgolf.com/api/v2/clubs';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
$result=curl_exec ($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
curl_close ($ch);

$data = json_decode($result);
$address = json_decode($result);


// All club data exists in 'data' object
$club_data = $data->_results;
$club_add = $address->_results;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>BRS clubs list</title>
</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-4">BRS Clubs List</span>
        </a>

    </header>
</div>
<?php foreach ($club_data as $club):
echo $club->name;?>
<div class="py-5 bg-body-tertiary">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <div class="col">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                        <?php echo $club_data->name;?>
                    </div>
                    <div class="card-body">
                        <p class="card-text">


</p>
<div class="d-flex justify-content-between align-items-center">
    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-outline-secondary">Visit</button>
    </div>
    <small class="text-body-secondary">(aberdovey)</small>
</div>
</div>
</div>
</div>

<div class="col">
    <div class="card shadow-sm h-100">
        <div class="card-header">
            Abergele Golf Club
        </div>
        <div class="card-body">
            <p class="card-text">
                Tan-y-Gopa Road, Abergele, Conwy, Wales, LL22 8DS
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Visit</button>
                </div>
                <small class="text-body-secondary">(abergele)</small>
            </div>
        </div>
    </div>
</div>

<div class="col">
    <div class="card shadow-sm h-100">
        <div class="card-header">
            Abridge Golf Club
        </div>
        <div class="card-body">
            <p class="card-text">
                Epping Lane, Stapleford Tawney, Essex, England, RM4 1ST
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Visit</button>
                </div>
                <small class="text-body-secondary">(abridge)</small>
            </div>
        </div>
    </div>
</div>

<div class="col">
    <div class="card shadow-sm">
        <div class="card-header">
            Adare Manor Golf Club
        </div>
        <div class="card-body">
            <p class="card-text">
                Adare (Old Course), Limerick, Ireland
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Visit</button>
                </div>
                <small class="text-body-secondary">(adaremanor)</small>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>


<?php endforeach;?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>


