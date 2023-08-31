<?php
// task is to display list of client IP addresses sorted by count of requests descending
$logContents = file_get_contents('/logs/access.log');
preg_match_all('/\d+\.\d+\.\d+\.\d+/', $logContents, $ipMatches);
$ipAddresses = $ipMatches[0];

// Count the occurrences of each IP address
$ipCounts = array_count_values($ipAddresses);

// Sort the IP addresses by their counts in descending order
arsort($ipCounts);

// Display the sorted list
foreach ($ipCounts as $ip => $count) {
    echo "IP: $ip, Requests: $count<br>";
}
?>
