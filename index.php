<?php
require_once("./vendor/autoload.php");

use Gumlet\ImageResize;


//$image = new ImageResize("./upload/biquette.jpg");
//var_dump($image);

/* 
 # Jingle Exercice !!!!

 Creez un formulaire qui comprendra un input file et un submit.
 Uploadez une image de taille supérieure qui au final devra
 faire 400px en width max.
 Cette image devra être affichée une fois le formulaire validé
 dans sa nouvelle taille.
 Tout cela devra être éffectué sur une unique page index.php.
 
 ## le tout doit être effectué en 5 minutes lol

  
 */

if (!empty($_FILES['img']) && isset($_FILES['img'])) {
    $img = $_FILES['img'];
    if ($img['size'] > 0 && $img['error'] === 0) {
        // La fonction explode sépare une chaine de caractères
        // à partir d'un séparateur.
        // ex : $chaine = "bonjour,ma,biquette";
        // $tableauBiquette = explode(",",$chaine);
        //  $tableauBiquette[0] => bonjour
        //  $tableauBiquette[1] => ma
        //  $tableauBiquette[2] => biquette
        // la même à l'envers avec implode()
        $ext = explode("/", $img['type']);
        if ($ext[0] === "image") {

            move_uploaded_file($img['tmp_name'], "./upload/" . $img['name']);
            $newImg = new ImageResize("./upload/" . $img['name']);
            $newImg->resizeToWidth(400);
            $newImg->save("./upload/" . $img['name']);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Script librairies puis script perso  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Styles librairies puis styles perso  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Resize Image</title>
</head>

<body>

    <div id="formmp3">
        <h1>Uploadez vos images</h1>
        <form action="index.php" enctype="multipart/form-data" method="post">
            <label for="img">Image</label>
            <input type="file" name="img" id="img">
            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>

</html>