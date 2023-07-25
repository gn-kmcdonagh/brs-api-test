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
    $id = $response->getBody();
    $data = json_decode($name);
    $id_data = json_decode($id);
} else {
    echo 'Fix if statement';
}


$club_data = $data->_results;
$club_data = $id_data->_results;

?>
<html>
<body>

<?php foreach ($club_data as $club):
    $uri = 'https://www.brsgolf.com/' . $club->club_id;
    ?>
    <li>

            <?= $club->name; ?>
        <a href="<?php echo $uri?>">
        <?php echo "(".$uri.$club->club_id.")"; ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>
</body>
</html>