<?php
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$street = $_POST['street'];
$zipcode = $_POST['zipcode'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$company = $_POST['company'];

// Reading the JSON file and converting it to a PHP Array
$users = json_decode(file_get_contents('../dataset/users.json'), true);

// Generating the ID for the new user
$lastUser = end($users);
$id = $lastUser['id'] + 1;

// Creating an associative array for the new user
$data = [
    'id' => $id,
    'name' => $name,
    'username' => $username,
    'email' => $email,
    'address' => [
        'street' => $street,
        'suite' => 'No data',
        'city' => $city,
        'zipcode' => $zipcode,
        'geo' => [
            'lat' => 'No data',
            'lng' => 'No data'
        ]
    ],
    'phone' => $phone,
    'website' => 'No data',
    'company' => [
        'name' => $company,
        'catchPhrase' => 'No data',
        'bs' => 'No data'
    ]
];

// Adding the new user's data to the existing array
$users[] = $data;

// Converting the updated array back to JSON format
$updatedJsonData = json_encode($users, JSON_PRETTY_PRINT);

// Overwriting the JSON file with the updated data
file_put_contents('../dataset/users.json', $updatedJsonData);

header('Location: ../index.php');
?>