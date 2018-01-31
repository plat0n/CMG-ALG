<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Test</title>
</head>
<body>
    <div class = "cadre">
    <form method="post">
        Choisissez le type de tri : </br>
        <select name="choix_tri">
            <option value="tri_par_selection">Tri par selection</option>
            <option value="tri_par_insertion">Tri par insertion</option>
            <option value="tri_a_bulles">Tri à bulles</option>
    
        </select><br/>
        <input type="submit" name="submit"/>
    </form>

    <?php

    # $result = preg_grep( "/[-]*((\d)+[.|,]*(\d)*)(?=(\s)*)/g" , $input);
    
    if (isset($_POST['choix_tri'])){
        switch ($_POST['choix_tri']) {
            case 'tri_par_selection':
                echo "Vous avez choisi le tri par selection :";
                break;
            case 'tri_par_insertion' :
                echo "Vous avez choisi le tri par insertion :";
                break;
            case 'tri_a_bulles' :
                echo "Vous avez choisi le tri à bulles :";
                break;
        }
    }
    ?>
</body>
</html>