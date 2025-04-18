<?php 
$json = file_get_contents("DISCHI.JSON");
$dischi = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dischi</title>
    <style>
        body {
            margin: 0;
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }
        .header {
            padding: 15px 0px 15px 20px;
            background-color: #82b1ff;
        }
        .header a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
        }
        main {
            padding: 20px;
        }
        .boxes-container {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 15px;
        }
        .box {
            flex: 0 0 auto;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .box .cover img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .box .titolo h1, 
        .box .artista h2,
        .box .anno h3,
        .box .genere h4 {
            margin: 5px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="form.php" target="form.php" rel="form">
            aggiungi un tuo disco 🧡 &leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;&leftarrow;
        </a>
    </div>
    <main>
        <h1>Lista dischi</h1>
        <div class="boxes-container">
        <?php 
        foreach ($dischi as $key => $value) {
            $titolo = $value["titolo"];
            $artista = $value["artista"];
            $pubblicazione = $value["anno_pubblicazione"];
            $genere = $value["genere"];
            $cover = $value["url_cover"];
            
            echo "<div class='box'>
                <div class='cover'>
                    <img src='$cover' alt='$titolo, $artista'>
                </div>
                <div class='titolo'>
                    <h1>$titolo</h1>
                </div>
                <div class='artista'>
                    <h2>$artista</h2>
                </div>
                <div class='anno'>
                    <h3>$pubblicazione</h3>
                </div>
                <div class='genere'>
                    <h4>$genere</h4>
                </div>
            </div>";
        }
        ?>
        </div>
    </main>
</body>
</html>