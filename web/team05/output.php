<?php

    try
    {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        echo "<h1>Scripture Resources</h1>";

        foreach ($db->query('SELECT * FROM team05.scriptures') as $row)
        {
        if ($row['book'] == $_GET['book']) {
            echo "<p><a href=\"prove05.php?book=" . $row["book"] . "&chapter=" . $row["chapter"] . "&verse=" . $row["verse"] . "\"><strong>" . $row['book'] . " ";
            echo $row['chapter'] . ":";
            echo $row['verse'] . "</strong><br/>";
            // echo "\"" . $row['content'] . "\"";
            echo "</a></p><br/>";
            }           

        }
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }

?>
