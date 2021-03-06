<!DOCTYPE html>
<html lang="ro">

<head>
    <title>Produse | Impressed</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?php echo URL; ?>public/css/seeProducts.css" rel="stylesheet" />
</head>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>
    <main>
        <div>
            <h1>Lista produse</h1>
            <hr>
        </div>

        <table>
            <tr>
                <th class="idProdus"></th>
                <th class="imagine"></th>
                <th class="denumire"></th>
                <th class="material"></th>
                <th class="pret"></th>
                <th class="sterge"></th>

            </tr>
            <br>

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
                        <?php echo $row['pret']  ?> lei
                    </td>
                    <td>
                        <form method="POST">
                            <button id="stergere-produs" formaction="<?php echo URL; ?>admin/stergeProdus/<?php echo $row['id_produs'] ?>" type="submit">Sterge</button>
                        </form>

                    </td>
                </tr>
            <?php } ?>

        </table>
        <ul class="paginare"> 
        <?php 
                      
        for ($i=1; $i<=$this->total_pages; $i++) { ?>

         <a class="pagina" href='<?php echo URL;?>admin/listareProduse?page=<?php echo $i; ?>'><?php echo $i; ?> </a> 
          
        <?php }
        ?>
        </ul> 
    </main>

    <?php
    require 'footer.php';
    ?>
    
</body>

</html>