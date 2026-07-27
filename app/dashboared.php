<?php

include("assets/fn/config.php");

// --- 1. DYNAMIC DASHBOARD COUNTS ---

// Computer Maintenance Count (Checks for desktop, laptop, maintenance, or computer)
$query_comp = "SELECT COUNT(*) AS total FROM ictform WHERE LOWER(equipmenttype) IN ('desktop', 'laptop', 'maintenance', 'computer')";
$result_comp = mysqli_query($link, $query_comp);
$row_comp = mysqli_fetch_assoc($result_comp);
$count_computer = $row_comp['total'] ?? 0;

// Networking Count
$query_net = "SELECT COUNT(*) AS total FROM ictform WHERE LOWER(equipmenttype) = 'networking'";
$result_net = mysqli_query($link, $query_net);
$row_net = mysqli_fetch_assoc($result_net);
$count_networking = $row_net['total'] ?? 0;

// System Support Count
$query_sys = "SELECT COUNT(*) AS total FROM ictform WHERE LOWER(equipmenttype) IN ('mobile', 'system', 'software')";
$result_sys = mysqli_query($link, $query_sys);
$row_sys = mysqli_fetch_assoc($result_sys);
$count_system = $row_sys['total'] ?? 0;

// Other Requests Count
$query_other = "SELECT COUNT(*) AS total FROM ictform WHERE LOWER(equipmenttype) NOT IN ('desktop', 'laptop', 'maintenance', 'computer', 'networking', 'mobile', 'system', 'software')";
$result_other = mysqli_query($link, $query_other);
$row_other = mysqli_fetch_assoc($result_other);
$count_other = $row_other['total'] ?? 0;

// --- 2. FETCH ALL REQUESTS FOR THE TABLE ---
$query_table = "SELECT * FROM ictform ORDER BY id DESC";
$result_table = mysqli_query($link, $query_table);
?>