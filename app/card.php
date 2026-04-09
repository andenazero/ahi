<?php
// Define an array with names as keys and their groups as values
$namesGroups = [
    "Tewodros Alemu" => "9",
    "Demessa Negera" => "15",
    // Add more names and groups as needed
];

$name = "Bob";
// Function to check the group of a given name
function getGroup($name, $array) {
    if (isset($array[$name])) {
        return $array[$name];
    } else {
        return "Name not found in any group.";
    }
}

// Example usage
// $nameToCheck = "Alice";
// echo getGroup($nameToCheck, $namesGroups); // Output: Group A
?>

