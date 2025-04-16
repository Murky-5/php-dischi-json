<?php 
$json = file_get_contents("DISCHI.JSON");
$dischi = json_decode($json, true);
echo "<pre>";
var_dump($dischi); 
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista dischi</title>
</head>
<body>
    <div class="header">
        <a href="form.php" target="form.php" rel="form">
            aggiungi un tuo disco 🧡
        </a>
    </div>
    <main>
        <h1>Lista dischi</h1>
        <?php 
        foreach ($dischi as $key => $value) {
            $titolo = $value["titolo"];
            $artista = $value["artista"];
            $pubblicazione = $value["anno_pubblicazione"];
            $genere = $value["genere"];
            $cover = $value["url_cover"];
            
            
            
            echo "<div class=`box`>
                <div class=`cover`>
                    <img src=$cover alt='$titolo, $artista'>
                </div>
                <div class=`titolo`>
                    <h1>$titolo</h1>
                </div>
                <div class=`artista`>
                    <h2>$artista</h2>
                </div>
                <div class=`anno`>
                    <h3>$pubblicazione</h3>
                </div>
                <div class=`genere`>
                    <h4>$genere</h4>
                </div>
                </div>";
        };
            ?>
    </main>

</body>
</html>