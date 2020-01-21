<!DOCTYPE html>
<html>
    <head>
        <title>Teach 03: Form Submission</title>
        <meta charset="utf8" />
    </head>
    <body>
        <form action="results.php" method="POST">
            Name: <input name="name" type="text" placeholder="John Smith"/><br/>
            Email: <input name="email" type="text" placeholder="j.smith1@mail.com"/><br/>
            Major:<br/>
            <!-- <ul>
                <li><input name="major" type="radio" value="Computer Science"/>Computer Science</li>
                <li><input name="major" type="radio" value="Web Design and Development"/>Web Design and Development</li>
                <li><input name="major" type="radio" value="Computer Information Technology"/>Computer Information Technology</li>
                <li><input name="major" type="radio" value="Computer Engineering"/>Computer Engineering</li>
            </ul> -->
            <?php
                $fields = ["Computer Science (CS)", "Web Design & Development (WDD)", "Computer Information Technology (CIT)", "Computer Engineering (CE)"];
                foreach ($fields as $field) {
                    echo "<input type=\"radio\" name=\"major\" value=\"" . $field . "\"/>" . $field . "<br/>";
                    // echo $field;
                }
            ?>
            <br/>Comments:<br/>
            <input name="comments" type="textarea" placeholder="Comments..."/><br/>
            <ul>
                <li><input name="continents[]" type="checkbox" value="na"/>North America</li>
                <li><input name="continents[]" type="checkbox" value="sa"/>South America</li>
                <li><input name="continents[]" type="checkbox" value="eu"/>Europe</li>
                <li><input name="continents[]" type="checkbox" value="as"/>Asia</li>
                <li><input name="continents[]" type="checkbox" value="au"/>Australia</li>
                <li><input name="continents[]" type="checkbox" value="af"/>Africa</li>
                <li><input name="continents[]" type="checkbox" value="an"/>Antartica</li>
                <li><input name="continents[]" type="checkbox" value="at"/>Atlantis</li>
            </ul>
            <input type="submit" value="SUBMIT" />
        </form>
    </body>
</html>