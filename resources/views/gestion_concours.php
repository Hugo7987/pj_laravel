<?php
  use Illuminate\Support\Facades\DB;

  $concours = DB::scalar('select nom from mcd_concours');
?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Concours Robot 2026</title>
  <link rel="stylesheet" href="./css/page.css" media="all">
</head>

<body>
<div class="website">
  <!-- En-tête -->
  <header class="header" role="banner">
    <h1>Gestion - Concours Robot</h1>
  </header>

  <!-- Menu de navigation -->
  <aside class="aside">
    <nav class="navigation" role="navigation">
      <ul class="navigation-list">
        <li class="navigation-item"><a class="navigation-link" href="#">Concours</a></li>
        <!-- <li class="navigation-item"><a class="navigation-link" href="welcome">Welcome</a></li> -->
        <li class="navigation-item"><a class="navigation-link" href="mention_lgl">Mentions Légales</a></li>
      </ul>
    </nav>
  </aside>
  
  <!-- Contenu principal -->
  <main id="main" role="main" class="main">
    <div class="btn_concours"><?php echo($concours) ?></div>
  
  
  <!-- Pied de page -->
  <footer class="footer" role="contentinfo">
    <p>&copy; 2026 Concours Robot – Organisé par les collèges des Deux-Sèvres</p>
  </footer>
</div>
</body>

</html>