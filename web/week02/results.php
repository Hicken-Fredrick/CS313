<?php
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $major = htmlspecialchars($_POST['major']);
    $comments = htmlspecialchars($_POST['comments']);
    $continents_map = [
        "na" => "North America",
        "sa" => "South America",
        "eu" => "Europe",
        "as" => "Asia",
        "au" => "Australia",
        "af" => "Africa",
        "an" => "Antartica",
        "at" => "Atlantis"
    ];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Teach 03: Form Submission</title>
        <meta charset="utf8"/>
    </head>
    <body>
        <p><?php echo "Name: " . $name . "\n"; ?></p>
        <p><?php echo "Email: " . $email . "\n"; ?></p>
        <p><?php echo "Major: " . $major . "\n"; ?></p>
        <p><?php echo "Comments: " . $comments . "\n"; ?></p>
        <?php
            foreach ($_POST['continents'] as $continent) {
                echo "<p>You have visited " . $continents_map[$continent] . ", how exciting.\n</p>";
            }
        ?>
    </body>
</html>