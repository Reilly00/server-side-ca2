<?php
require_once('database.php');

$queryRecipes = 'SELECT r.recipe_id, r.recipe_title, r.recipe_description, r.recipe_image, r.recipe_cooking_time, r.recipe_instructions, GROUP_CONCAT(CONCAT_WS(": ", i.ingredient_name, i.ingredient_quantity, i.ingredient_unit)) AS ingredients
                FROM recipes r 
                INNER JOIN ingredients i 
                ON r.recipe_id = i.recipe_id 
                GROUP BY r.recipe_id
                ORDER BY r.recipe_id';
$statement = $db->prepare($queryRecipes);
$statement->execute();
$recipes = $statement->fetchAll();
$statement->closeCursor();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Recipe Website</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="mystyle.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
      <div class="container">
        <a class="navbar-brand" href="index.php">DietDish</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
          <span class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="page-3.php">Contact Us</a>
              </li>
            </ul>
          </span>
        </div>
      </div>
    </nav>

<main class="container">

<header class="hero">
<div class="hero-container">
  <div class="hero-text">
    <h1>Simply the best for your diet</h1>
  </div>
</div>
</header>

<div class="recipes-list">
  <?php foreach ($recipes as $recipe) : ?>
    <div class="recipe">
      <a href="recipe_details.php?id=<?php echo $recipe['recipe_id']; ?>">
        <img src="<?php echo $recipe['recipe_image']; ?>" alt="<?php echo $recipe['recipe_title']; ?>" class="img recipe-img"/>
      </a>
      <h5><?php echo $recipe['recipe_title']; ?></h5>
      <p>Cooking time in minutes: <?php echo $recipe['recipe_cooking_time']; ?></p>
    </div>
  <?php endforeach; ?>
</div>

</main><!-- /.container -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>

<!-- References: 
    https://www.youtube.com/watch?v=524ycUqs3f0&t=23s
    https://www.youtube.com/watch?v=-8LTPIJBGwQ
-->