<!DOCTYPE html>
<?php include("header.php");
$db = new SQLite3('dbs/projects_db');
$statement = $db->prepare(
    "SELECT * FROM projects WHERE directory = '{$_GET['name']}'");
$data = $statement->execute()->fetchArray();
?>
<html>
    <head>
        <title><?= $data['name']?></title>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <?php
        if ($data)
            include("projects/{$_GET['name']}main.php");
        else
            echo "Project {$data['name']} does not exist";
        ?>
    </body>
</html>
