<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Test</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="cadre">
        <div class="title">
            <h1>ALGORYTHMIE</h1>
        </div>
        <form name="sorting" method="POST">
            <p>Choisissez le type de tri :
                <select name="sort">
                    <option value="selection">Tri par selection</option>
                    <option value="insertion">Tri par insertion</option>
                    <option value="bubble">Tri à bulles</option>
                    <option value="quick">Tri rapide</option>
                    <option value="shell">Tri Shell</option>
                    <option value="fusion">Tri fusion</option>
                </select>
            </p>
            <p>insérez les valeurs séparées par des espaces: </p>
            <input name="values">
            <input type="submit"/>
        </form>

        <?php
        if (isset($result)) {
            echo "<p><span> Sorted in " . $result->diff . " seconds</span>,";
            echo "<span> number of iterations: " . $result->iterations . "</span></p>";
            echo "<p> Result: </p>";
            echo "<p class='result'>";
            if (!empty($result->result))
                foreach ($result->result as $value) {
                    echo " " . $value . " ";
                }
                echo "</p>";
            }
            ?>
        </div>
    </body>
    </html>