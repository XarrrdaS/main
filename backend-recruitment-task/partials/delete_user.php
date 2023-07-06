<?php
$jsonFile = '../dataset/users.json';
$id = $_POST['id'];

$contents = file_get_contents($jsonFile);
$users = json_decode($contents, true);

// Checking if a record with the specified ID exists
if (!isset($id) || !isset($users[$id])) {
    // If not, sending an error response
    echo 'error';
    exit;
}

// Updating the IDs of the remaining records
$new_users = [];
$i = 1;
foreach ($users as $key => $user) {

    // Skipping the deleted record
    if ($key == $id) { 
        continue;
    }
    $user['id'] = $i;
    $new_users[] = $user;
    $i++;
}

// Converting the updated array back to JSON
$updatedJsonData = json_encode($new_users, JSON_PRETTY_PRINT);

// Overwriting the JSON file with the updated data
file_put_contents($jsonFile, $updatedJsonData);

echo 'success';
?>