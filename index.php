<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Pokemon</title>
</head>
<body>
<h1>Pokemon challenge</h1>
<section id="search" class="section">
    <form action="">
        <label>
            <input type="text" name="pokemon"/>
        </label>
        <button type="submit">Find Pokemon</button>
    </form>
</section>
<section id="species">
    <?php

    $search = "squirtle";

    if (!empty($_GET["pokemon"])) {
        $search = $_GET["pokemon"];
        
    //fetching API
    $pokemonSpecies_url = "https://pokeapi.co/api/v2/pokemon-species/" . $search;
    $pokemon_api = "https://pokeapi.co/api/v2/pokemon/" . $search;

    // DECLARING THE VARIABLES

    //file_get_contents — Reads entire file into a string
    $pokemon_data = file_get_contents($pokemon_api);
    // Read JSON file. Values in JSON can be true/false or null.
    $pokemonSpecies = json_decode($pokemon_data, true);

    $pokemon_id = $pokemonSpecies["id"];
    $pokemon_name = $pokemonSpecies["name"];
    $pokemon_image = $pokemonSpecies["sprites"]["front_default"];
    $pokemon_weight = $pokemonSpecies['weight'];
    $pokemon_height = $pokemonSpecies['weight'];
    ?>
</section>
<section id="pokemon">
    <!---Getting outputs by using echo --->
    <h2 id="pokemon_id"><?php echo("Id = $pokemon_id") ?> </h2>
    <h3 id="pokemon_name"><?php echo("Name = $pokemon_name") ?> </h3>
    <img id = img src="<?php echo $pokemon_image ?>" alt="pokemon image">

<!--- getting output of moves by echo--->
    <ul>
        <li><?php echo "weight=" . $pokemonSpecies['weight'] . "kg";?></li>
        <li><?php echo "height=" . $pokemonSpecies['height'] . "cm";?></li>
        <li><?php echo $pokemonSpecies['moves'][0]['move']['name'] ?></li>
        <li><?php echo $pokemonSpecies['moves'][1]['move']['name'] ?></li>
        <li><?php echo $pokemonSpecies['moves'][2]['move']['name'] ?></li>
        <li><?php echo $pokemonSpecies['moves'][3]['move']['name'] ?></li>

    </ul>
</section>
</body>
</html>