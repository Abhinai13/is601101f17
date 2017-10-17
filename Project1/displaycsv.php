<?php
// Create a table from a csv file 
echo "<html><body>\n\n";

//$f = fopen("uploads".DIRECTORY_SEPARATOR."test.csv", "r");

/*
$f = fopen($_GET['filename'], "r");

while (($line = fgetcsv($f)) !== false) {
        $row = $line[0];    // We need to get the actual row (it is the first element in a 1-element array)
        $cells = explode(",",$row);
        echo "<tr>";
        foreach ($cells as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
}
fclose($f);
echo "\n</table></body></html>";
*/
$filename = $_GET['filename'];
display_file($filename,true);

echo "\n</body></html>";

function display_file($filename, $header=false) {
$handle = fopen($filename, "r");
echo '<table border="1">';
//display header row if true
if ($header) {
    $csvcontents = fgetcsv($handle);
    echo '<tr>';
    foreach ($csvcontents as $headercolumn) {
        echo "<th>$headercolumn</th>";
    }
    echo '</tr>';
}
// displaying contents
while ($csvcontents = fgetcsv($handle)) {
    echo '<tr>';
    foreach ($csvcontents as $column) {
        echo "<td>$column</td>";
    }
    echo '</tr>';
}
echo '</table>';
fclose($handle);
}
?>