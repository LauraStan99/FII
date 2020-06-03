<!DOCTYPE html> 
<html> 
  <head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" 
     href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
  </head> 
  <body> 
  <?php 
      
 
   $con = new PDO('mysql:host=localhost:3308;dbname=impressed', 'dba', 'sql');
  
    $limit = 50;     
    if (isset($_GET["page"])) {  
      $pn  = $_GET["page"];  
    }  
    else {  
      $pn=1;  
    };   
  
    $start_from = ($pn-1) * $limit;   
  
    $sql = "SELECT * FROM produse LIMIT $start_from, $limit";   
    $rs_result = $con->query($sql);  
  
  ?> 
  <div class="container"> 
    <br> 
    <div> 
      <table class="table table-striped table-condensed table-bordered"> 
        <thead> 
        <tr> 
          <th width="10%">Id</th> 
          <th>Nume</th> 
          <th>Culoare</th> 
        </tr> 
        </thead> 
        <tbody> 
        <?php   
          while ($row = $rs_result -> fetch()) {  
        ?>   
        <tr>   
          <td><?php echo $row["id_produs"]; ?></td>   
          <td><?php echo $row["nume"]; ?></td> 
          <td><?php echo $row["culoare"]; ?></td>                                       
        </tr>   
        <?php   
        };   
        ?>   
        </tbody> 
      </table> 
      <ul class="pagination"> 
      <?php   
        $sql = "SELECT COUNT(*) FROM produse";   
        $rs_result = $con->query($sql);   
        $row = $rs_result -> fetch();   
        $total_records = $row[0];   
      
        $total_pages = ceil($total_records / $limit);   
        $pagLink = "";                         
        for ($i=1; $i<=$total_pages; $i++) { 
          if ($i==$pn) { 
              $pagLink .= "<li class='active'><a href='paginate.php?page="
                                                .$i."'>".$i."</a></li>"; 
          }             
          else  { 
              $pagLink .= "<li><a href='paginate.php?page=".$i."'> 
                                                ".$i."</a></li>";   
          } 
        };   
        echo $pagLink;   
      ?> 
      </ul> 
    </div> 
  </div> 
  </body> 
</html> 