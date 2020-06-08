<?php
define('DOCXML',URL."public/util/utilizatori.xml");
header ('Content-type: text/xml');

function checkIfEmailExists ($email_user) { 
   
    if (!($xml = simplexml_load_file (DOCXML))) {
        return 0;
      }
    foreach ($xml->xpath('/users/user/email') as $email) {
      if (!strcasecmp($email_user, $email)) {
        return 1;
      }
    }
    return 0;
}
?>
<response>
  <result><?php echo checkIfEmailExists ($_REQUEST['email']); ?></result>
</response>