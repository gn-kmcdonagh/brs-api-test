<?php
$username='brsmobileapp';
$password='QB6T9vmVw8WcbTZv8bGUJMs2E3SKU4jLBNJscNMZx4hyZdwfcta9ALqS4THXVxw679BFh5FsPEYbSUfHxSmvJVX9Wfm5gCPmterEJTWMzUjt8ej3kLwEbP7CkhLbfVAC8FvaxYDx2KzVvttMDsWxhNzmVqeqvjmVbFSNA2LgkfyDXTSD7XbPpNQRyZQcgzHSRuQVSQ5SZujDYjfm2TnetbP6Dk8gbf7Pae9vWA4kg5Bj84SsshnqMgGTFjPVeYr8';
$URL='https://www.brsgolf.com/api/v2/clubs';

require_once "./vendor/autoload.php";

$client = new \GuzzleHttp\Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://reqres.in',
]);



$response = $client->get('https://httpbin.org/basic-auth/user/passwd', [
    'auth' => [
        'user' => $username,
        'passwd' => $password
    ]
]);


$name = $response->getBody();
$data = json_decode($name);
print_r($data);

echo $response->getStatusCode();

if (200 == $response->getStatusCode()) {
    $name = $response->getBody();
    $data = json_decode($name);
    print_r($data);
}