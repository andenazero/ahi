<?php

/**
 * Retrieves employee ID and allowed card count by name.
 * * @param string $name The name of the employee to search for.
 * @param array $employeeDatabase The data source.
 * @return array|null Returns associative array if found, null otherwise.
 */
function getEmployeeCardDetails($name, $employeeDatabase) {
    foreach ($employeeDatabase as $employee) {
        // Case-insensitive check to make it user-friendly
        if (strcasecmp($employee['name'], $name) === 0) {
            return [
                'employee_id'   => $employee['id'],
                'allowed_cards' => $employee['allowed_cards']
            ];
        }
    }
    
    return null; // Return null if no match is found
}

// --- Example Usage ---

$data = [
    ['id' => '12001', 'name' => 'Tewodros Alemu', 'allowed_cards' => 9],
    ['id' => '12002', 'name' => 'Demessa Negera',   'allowed_cards' => 10],
];
