<!DOCTYPE html>
<html lang="ro">

<head>
  <title>Account | Impressed</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?php echo URL; ?>public/css/stergereProdusNew.css" rel="stylesheet" />
</head>

<body>
  <header>
    <?php
    require 'header.php';
    ?>
  </header>


  <main>
    <div>
      <h1>Stergere produs dupa ID</h1>
      <hr>
    </div>

    <div>
      <form method="post" class="input-cauta">
        <input type="text" name="cauta-produs" placeholder="Intoduce-ti ID-ul produsului" />
        <button class="buton-cauta" type="submit" name="cauta">Cauta</button>
      </form>
    </div>

    <?php if (isset($this->result) && $this->result != null) {  ?>
      <table>
        <tr>
          <th class="idProdus">ID</th>
          <th class="imagine">ARTICOL</th>
          <th class="denumire">DENUMIRE</th>
          <th class="material">MATERIAL</th>
          <th class="culoare">CULOARE</th>
          <th class="gen">GEN</th>
          <th class="pret">PRET</th>
          <th class="sterge">STEREGE</th>
        </tr>

        <?php
        while ($row = $this->result->fetch()) {
        ?>
          <tr>
            <td>
              <?php echo $row['id_produs']  ?>
            </td>
            <td>
              <img id="produs" src="<?php echo URL; ?>public/poze/<?php echo  $row['imagine']; ?>.png">
            </td>

            <td>
              <?php echo $row['nume']  ?>
            </td>
            <td>
              <?php echo $row['material']  ?>
            </td>
            <td>
              <?php echo $row['culoare']  ?>
            </td>
            <td>
              <?php echo $row['gen']  ?>
            </td>
            <td>
              <?php echo $row['pret']  ?> $
            </td>
            <td>
              <form method="POST">
                <button id="stergere-produs" formaction="<?php echo URL; ?>admin//<?php echo $row['id_produs'] ?>" type="submit">Sterge</button>
              </form>

            </td>
          </tr>
        <?php } ?>
      </table>
    <?php } ?>

    <?php
    if (isset($this->message)) {
      echo $this->message;
    }
    ?>





  </main>

  <?php
  require 'footer.php';
  ?>

</body>

</html>