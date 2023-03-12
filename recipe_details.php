<?php
require_once('database.php');

// Get the recipe details based on the ID passed as a parameter
if (isset($_GET['id'])) {
  $recipeId = $_GET['id'];
  $queryRecipeDetails = 'SELECT r.recipe_title, r.recipe_description, r.recipe_image, r.recipe_cooking_time, r.recipe_instructions, GROUP_CONCAT(CONCAT_WS(": ", i.ingredient_name, i.ingredient_quantity, i.ingredient_unit)) AS ingredients
                        FROM recipes r 
                        INNER JOIN ingredients i 
                        ON r.recipe_id = i.recipe_id 
                        WHERE r.recipe_id = :recipeId
                        GROUP BY r.recipe_id';
  $statement = $db->prepare($queryRecipeDetails);
  $statement->bindValue(':recipeId', $recipeId);
  $statement->execute();
  $recipeDetails = $statement->fetch();
  $statement->closeCursor();
}

// If the recipe ID is not set or no recipe was found, redirect to the index page
if (!isset($recipeDetails)) {
  header('Location: index.php');
  exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Starter Template · Bootstrap v5.0</title>
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

<div>
<h1><?php echo $recipeDetails['recipe_title']; ?></h1>
  <p><?php echo $recipeDetails['recipe_description']; ?></p>
  <img src="<?php echo $recipeDetails['recipe_image']; ?>" alt="<?php echo $recipeDetails['recipe_title']; ?>">

  <h2>Ingredients</h2>
  <ul>
    <?php 
    $ingredients = explode(',', $recipeDetails['ingredients']);
    foreach ($ingredients as $ingredient) {
      echo '<li>' . $ingredient . '</li>';
    }
    ?>
  </ul>

  <h2>Instructions</h2>
  <p><?php echo $recipeDetails['recipe_instructions']; ?></p>

  <h2>Cooking Time</h2>
  <p><?php echo $recipeDetails['recipe_cooking_time']; ?> minutes</p>
</div>

</main><!-- /.container -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
