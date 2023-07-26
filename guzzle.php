<?php


global $data;

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

//
//if (200 == $response->getStatusCode()) {
//    $name = $response->getBody();
//
//    $data = json_decode($name);
//    $clubData =$data->_results;
//
//         foreach ($clubData as $club):
//        $uri = 'https://www.brsgolf.com/' . $club->club_id;
//        ?>
<!--        <li>-->
<!---->
<!--            --><?php //= $club->name; ?>
<!--            <a href="--><?php //echo $uri ?><!--">-->
<!--                --><?php //echo "(" . $uri . $club->club_id . ")"; ?>
<!--            </a>-->
<!--        </li>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!-- --><?php //endforeach;
//} else {
//echo ' no clubs found';
//}


?>
<html>
<body>
<style>
    h1 {
        font-family: sans-serif;
        font-size: 50px;
        padding: 40px;
        margin-bottom: 10px;
        margin-left: 0;
        width: 100%;
        text-align: center;
        display: flex;
    }

    li {
        list-style: none;
        font-size: 20px;
        font-family: sans-serif;

    }

    body {
        background: #30E8BF; /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #FF8235, #30E8BF); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #FF8235, #30E8BF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
</style>
<ul>
    <h1>BRS GOLF CLUB LINKS</h1>

    <?php
    if (200 == $response->getStatusCode()) {
        $name = $response->getBody();

        $data = json_decode($name);
        $clubData = [];

        foreach ($clubData as $club):
            $uri = 'https://www.brsgolf.com/' . $club->club_id;
            ?>
            <li>

                <?= $club->name; ?>
                <a href="<?php echo $uri ?>">
                    <?php echo "(" . $uri . $club->club_id . ")"; ?>
                </a>
            </li>


        <?php endforeach;
    } else { ?>
    <h2><?php echo ' No clubs found';
        } ?>
    </h2>


</body>
</html>