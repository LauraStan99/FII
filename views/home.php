<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Home | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/home.css" rel="stylesheet" />

</head>

<body>
  <?php
  require 'header.php';
  ?>
  <main>
  <div class="poze-main">
      <a href="<?php echo URL; ?>home" title="Slide1"><img src="<?php echo URL; ?>public/poze/slide1.png" alt="Slide1" /></a>
    </div>

    <div class="poze-main">
      <a href="<?php echo URL; ?>home" title="Slide2"><img src="<?php echo URL; ?>public/poze/slide2.png" alt="Slide2" /></a>
    </div>

    <div class="poze-main">
      <a href="<?php echo URL; ?>home" title="Slide3"><img src="<?php echo URL; ?>public/poze/slide3.png" alt="Slide3" /></a>
    </div>

    <div class="poze-main">
      <a href="<?php echo URL; ?>home" title="Slide4"><img src="<?php echo URL; ?>public/poze/slide4.png" alt="Slide4" /></a>
    </div>

    <div class="poze-main">
      <a href="<?php echo URL; ?>home" title="Slide5"><img src="<?php echo URL; ?>public/poze/slide5.png" alt="Slide5" /></a>
    </div>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/slide.js"></script>
  </main>
  
  <?php
  require 'footer.php';
  ?>
</body>

</html>