<style>
td, th{
    padding: 5px;
}

</style>
<?php
require_once('includes\header.inc');
/*
 * #1 - Admin can specify an image and create links (rectangular areas)
 * #2 - Admin can delete, update the previously created links
 * #3 - Admin can submit / persist the data into the database
 * #4 - Admin is able to retrieve the existing links
 */

echo "<h1>Admin</h1>";

mysqli_select_db($conn, "imageframework");

$query = "SELECT * FROM imagelinks";
$result = aQuery($query);
if($result->num_rows > 0 ){
    echo "<br/><table><thead><tr>";
        echo "<th>URL</th>";
        echo "<th>Name</th>";
        echo "<th>Target</th>";
        echo "<th>Coordinates</th>";
        echo "<th>Edit</th></tr></thead><tbody>";

        while($row = $result->fetch_array()){
            echo "<tr>";
            echo "<td><a href=\"" . $row['link_url'] ."\" target=\"_blank\">Link</a></td>";
            echo "<td>" . $row['link_name'] . "</td>";
            echo "<td>" . $row['link_target'] . "</td>";
            echo "<td>(" . $row['link_coords'] . ")</td>";
            echo "<td><a href=\"editLink.php\">Edit</a></td></tr>";
        }

        echo "</tbody></table>";
        // Free result set
        $result->free();

} else{
    echo "<p><em>No records were found.</em></p>";
}

require_once('includes\footer.inc');
?>
