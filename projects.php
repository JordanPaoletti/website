<!DOCTYPE html>
<html>
    <head>
        <title>Projects</title>
        <link href="css/stylesheet.css" rel="stylesheet"  type="text/css" >
    </head>
    <body>
        <?php include("header.php"); ?>
        <h1>Projects</h1>
        <div id="projects">
            <?php
            function addProjectData($row) {
                $entry = <<<EOT
<div id='project_entry'>
    <a href='project.php?name={$row['directory']}'><h2>{$row['name']}</h2></a>
    <p>{$row['description']}</p>
    <ul>
        <li>Created date: {$row['created_date']}</li>
        <li>Last edited: {$row['edited_date']}</li>
    </ul>
</div>
EOT;
                echo $entry;
            }


            $db = new SQLite3('dbs/projects_db');
            $statement = $db->prepare(
                'SELECT * FROM projects ORDER BY created_date DESC LIMIT 5');
            $result = $statement->execute();

            while ($row = $result->fetchArray()) {
                addProjectData($row);
            }
            ?>
        </div>
    </body>
</html>
