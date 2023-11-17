<?php
include_once 'google-api-php-client-main/vendor/autoload.php';

//connction database
$conn = connectToMaster("list_management");

$client = new Google\Client();

$client->setApplicationName("Red3i_Postmaster");
$client->setAuthConfig('file.json');
$client->setScopes(['https://www.googleapis.com/auth/postmaster.readonly']);

$service = new Google\Service\PostmasterTools($client);

$results = $service->domains->listDomains();
echo '<pre>';
print_r($results);
echo '</pre>';

$results = $service->domains->get('domains/domain.com');
echo '<pre>';
print_r($results);
echo '</pre>';

?>