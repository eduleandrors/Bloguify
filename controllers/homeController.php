<?php 
require_once('../bloguify/src/PHPMailer.php');
    require_once('../bloguify/src/SMTP.php');
    require_once('../bloguify/src/Exception.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
Class homeController extends Controller{

    public function index(){
        $this->carregarTemplate('template', ["view"=> "home"]);
    }

    public function docs(){
        $this->carregarTemplate('template', ["view"=> "docs"]);
    }

    public function faleConosco(){
        $this->carregarTemplate('template', ["view"=> "faleConosco"]);
    }

    public function enviarEmail(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST["nome"]) && !empty($_POST["nome"])){
                if(isset($_POST["email"]) && !empty($_POST["email"])){
                    if(isset($_POST["assunto"]) && !empty($_POST["assunto"])){
                        if(isset($_POST["mensagem"]) && !empty($_POST["mensagem"])){
                            $mail = new PHPMailer(true);
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'contact.bloguify@gmail.com';
                            $mail->Password = 'skwo yoyb gpyz siwn';
                            $mail->Port = 587;
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                            $mail->setFrom('contact.bloguify@gmail.com');
                            $mail->addAddress("contact.bloguify@gmail.com");
                            $mail->isHTML(true);
                            $mail->Subject = $_POST["assunto"].' - '.$_POST["nome"];
                            $mail->Body = $_POST["mensagem"];
                            if($mail->send()){
                                header('Location: /bloguify/home/faleConosco');
                            }else{
                                echo 'Email não enviado :(';
                                die;
                            }
                        }
                    }
                }
            }
        }
    }

    public function sobreNos(){
        $this->carregarTemplate('template', ["view"=> "sobreNos"]);
    }
}



?>