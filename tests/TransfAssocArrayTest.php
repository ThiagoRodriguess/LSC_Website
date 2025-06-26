<?php
require_once __DIR__ . '/../functions.php';

$tsv = "John Doe\tCS\t123\nJane Doe\tMath\t456\n";
$labels = ["Full Name", "Course", "ID"];

$handle = fopen('php://memory', 'w+');
fwrite($handle, $tsv);
rewind($handle);

$result = transf_assoc_array($labels, $handle, "Full Name");

fclose($handle);

$expected = [
    "John Doe" => ["Full Name" => "John Doe", "Course" => "CS", "ID" => "123"],
    "Jane Doe" => ["Full Name" => "Jane Doe", "Course" => "Math", "ID" => "456"],
];

if ($result === $expected) {
    echo "Test passed\n";
    exit(0);
} else {
    echo "Test failed\n";
    var_export($result);
    echo "\n";
    exit(1);
}
?>
