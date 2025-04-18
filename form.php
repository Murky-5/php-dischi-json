<?php 
$titolo = isset($_POST["titolo"]) ? (!$_POST["titolo"] == "" ? $_POST["titolo"] : false) : "empty";
$artista = isset($_POST["artista"]) ? (!$_POST["artista"] == "" ? $_POST["artista"] : false) : "empty";
$cover = isset($_POST["url_cover"]) ? (!$_POST["url_cover"] == "" ? $_POST["url_cover"] : false) : "empty";
$pubblicazione = isset($_POST["anno_pubblicazione"]) ? (!$_POST["anno_pubblicazione"] == "" ? $_POST["anno_pubblicazione"] : false) : "empty";
$genere = isset($_POST["genere"]) ? (!$_POST["genere"] == "" ? $_POST["genere"] : false) : "empty";

if ($titolo == false && $artista == false && $cover == false && $pubblicazione == false && $genere == false) {
session_start();
$_SESSION["disco"] = [
    "titolo" => $titolo,
    "artista" => $artista,
    "url_cover" => $cover,
    "anno_pubblicazione" => $pubblicazione,
    "genere" => $genere
];

echo "<div>";
echo "nella richiesta ci sono dati del disco errati </br>" . $_SESSION["disco"]["titolo"] . "</br>" . $_SESSION["disco"]["artista"] . "</br>" . $_SESSION["disco"]["url_cover"] . "</br>" . $_SESSION["disco"]["anno_pubblicazione"] . "</br>" . $_SESSION["disco"]["genere"];
echo "</div>";
session_unset();
session_destroy();
}
elseif ($titolo == "empty" && $artista == "empty" && $cover == "empty" && $pubblicazione == "empty" && $genere == "empty") {
    

}
else { $file = file_get_contents("DISCHI.JSON");
    $dischi = json_decode($file, true);
    $dischi[] = [
        "titolo" => $titolo,
        "artista" => $artista,
        "url_cover" => $cover,
        "anno_pubblicazione" => $pubblicazione,
        "genere" => $genere
    ];


$json_string = json_encode($dischi);
file_put_contents("DISCHI.JSON", $json_string);
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi nuovo disco</title>
    <style>
        body {
            background-color: #f0f4f8;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 50px;
            border: 2px solid #82b1ff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form label {
            display: block;
            margin-top: 15px;
            color: #333;
        }
        form input {
            width: 100%;
            padding: 8px 0 8px 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #82b1ff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #669dd1;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" target="index.php" rel="homepage">
                <- Home
            </a>
        <h1>Aggiungi un nuovo disco</h1>
        <form action="" method="post">
            <label for="titolo">Titolo:</label>
            <input type="text" id="titolo" name="titolo" required>
            <br>
            <label for="artista">Artista:</label>
            <input type="text" id="artista" name="artista" required>
            <br>
            <label for="url_cover">URL della Cover:</label>
            <input type="url" id="url_cover" name="url_cover" required>
            <br>
            <label for="anno_pubblicazione">Anno di Pubblicazione:</label>
            <input min=0 max=2025 type="number" id="anno_pubblicazione" name="anno_pubblicazione" required>
            <br>
            <label for="genere">Genere:</label>
            <input type="text" id="genere" name="genere" required>
            <br>
            <button type="submit">Aggiungi Disco</button>
        </form>
    </div>
</body>
</html>
