<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Home | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/home.css" rel="stylesheet" />
  <script src="<?php echo URL; ?>public/js/slide.js"></script>

</head>

<body>
  <?php
  require 'header.php';
  ?>
  <main>
    <div class="slides">
      <img class="mySlides" src="<?php echo URL; ?>public/poze/slide1.png" style="width:100%">
      <img class="mySlides" src="<?php echo URL; ?>public/poze/slide2.png" style="width:100%">
      <img class="mySlides" src="<?php echo URL; ?>public/poze/slide3.png" style="width:100%">
      <img class="mySlides" src="<?php echo URL; ?>public/poze/slide4.png" style="width:100%">
      <img class="mySlides" src="<?php echo URL; ?>public/poze/slide5.png" style="width:100%">
      <script>
        carousel();
      </script>
    </div>

  </main>

  <?php
  require 'footer.php';
  ?>
</body>

</html>