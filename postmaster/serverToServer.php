<?php
include_once 'google-api-php-client-main/vendor/autoload.php';

//connction database
$conn = connectToMaster("list_management");

$client = new Google\Client();

$client->setApplicationName("Bugai Postmaster");
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

$optParams = [
    "startDate.day" => 1,
    "startDate.month" => 1,
    "startDate.year" => 2023,
    "endDate.day" => 21,
    "endDate.month" => 11,
    "endDate.year" => 2023
];

$results = (array) $service->domains_trafficStats->listDomainsTrafficStats('domain_name', $optParams);

echo '<pre>';
print_r($results);
echo '</pre>';

?>