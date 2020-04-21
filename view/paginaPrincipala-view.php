<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="../css/PaginaPrincipala.css" rel="stylesheet" />
  
</head>

<body>

  <?php
  require 'header.php';
  ?>

  <main>
   
    <a class="inapoi" onclick="incrementSlide(-1)"> &#10094;</a>
    <a class="inainte" onclick="incrementSlide(1)"> &#10095;</a>

    <div class="poze-main">
      <a href="./paginaPrincipala-view.php" title="Slide1"><img src="../Poze/slide1.png" alt="Slide1" /></a>
    </div>

    <div class="poze-main">
      <a href="./paginaPrincipala-view.php" title="Slide2"><img src="../Poze/slide2.png" alt="Slide2" /></a>
    </div>

    <div class="poze-main">
      <a href="./paginaPrincipala-view.php" title="Slide3"><img src="../Poze/slide3.png" alt="Slide3" /></a>
    </div>

    <div class="poze-main">
      <a href="./paginaPrincipala-view.php" title="Slide4"><img src="../Poze/slide4.png" alt="Slide4" /></a>
    </div>

    <div class="poze-main">
      <a href="./paginaPrincipala-view.php" title="Slide5"><img src="../Poze/slide5.png" alt="Slide5" /></a>
    </div>
    <script src="../js/slide.js"> </script>
    
  </main>
  <footer>
    <?php
    require 'footer.php';
    ?>
  </footer>
</body>
</html>