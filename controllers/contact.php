<?php
use PHPMailer\PHPMailer\PHPMailer;
class Contact extends Controller{
    public function __construct(){
        parent::__construct();
    }

    /**
     * daca butonul "Trimiteti" din pagina de contact a fost apasat
     * inainte de a trimite datele mai departe
     * le preiau si le validez
     * daca apar erori, retin aceste erori si le afisez pe front
     * daca nu exista erori, odata la apasarea butonului
     * va fi trimis un email cu datele din formular catre magazin
     */
    public function index(){
        $validate = new Validate();

        if (isset($_POST["submit"])) {
            $validate->validateLastName($this->view->lastName, $this->view->lastNameErr);
            $validate->validateFirstName($this->view->firstName, $this->view->firstNameErr);
            $validate->validateEmail($this->view->email, $this->view->emailErr);
            $validate->validatePhone($this->view->phone, $this->view->phoneErr);
            $validate->validateMessage($this->view->message, $this->view->messageErr);

            if($this->view->lastNameErr == "" && $this->view->firstNameErr == "" &&  $this->view->emailErr == "" && $this->view->phoneErr == "" && $this->view->messageErr == ""){
                $this->view->successMessage = "Datele au fost trimise cu succes!";

                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "impressed.shop2020";
                $mail->Password = "impressed2020$";
                $mail->Port = 587;
                $mail->SMTPSecure="tls";

                $mail->isHTML(true);
                $mail->setFrom($this->view->email);
                $mail->addAddress("impressed.shop2020@gmail.com");
                $mail->Subject = "Contact";
                $mail->Body = "
                <html>
                <body>
                <p>Datele utilizatorului:</p>
                <table>
                <tr>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Email</th>
                <th>Telefon</th>
                </tr>
                <tr>
                <td>".$this->view->lastName."</td>
                <td>".$this->view->firstName."</td>
                <td>".$this->view->email."</td>
                <td>".$this->view->phone."</td>
                </tr>
                </table>
                <p>Problema utilizatorului:</p>
                <tr>
                <th>Detalii</th>
                </tr>
                <tr>
                <td>".$this->view->message."</td>
                </tr>
                </body>
                </html>
                ";
                $mail->send();
                $mail->clearAddresses();
                $mail->smtpClose();
            }
        }
        $this->view->render('contact');
    }
}
