<?php
require_once '../model/Usuario.php';
require_once '../conexao/UsuarioDAO.php';
require_once '../conexao/Conexao.php';

//Inicio Enviar e-mail
require_once 'phpmailer/PHPMailerAutoload.php';

 $usuarioDAO = new UsuarioDAO();
 $busca = $usuarioDAO->buscaUsuario();

$email = addslashes($_POST['email']);

 foreach ($busca as $row){

    if ($row['email_usu'] == $email) {
        $rows = "igual";
    }
 }
 
// Delete conta
if (isset($_POST['cadastrar_usuario'])) {
    if ($rows != "igual") {
    define("PASTA_IMAGEM", "../vendor/img/");
    
    //Recuperar dados do formulário
    $nome      = addslashes($_POST['nome']);
    $sobrenome = addslashes($_POST['sobrenome']);
    $email     = addslashes($_POST['email']);
    $senha     = addslashes(md5($_POST['senha']));
    $foto      = $_FILES['foto']['name'];
    $temp      = $_FILES['foto']['tmp_name'];
    
    $_SESSION["emailCad"] = $email;



    move_uploaded_file($temp, PASTA_IMAGEM . $foto);
    
    
    $usuario = new Usuario();
    
    $usuario->setNome($nome);
    $usuario->setSobrenome($sobrenome);
    $usuario->setEmail($email);
    $usuario->setSenha($senha);
    $usuario->setFoto($foto);
    
    
    
    $usuarioDAO = new UsuarioDAO();
    
    $verificar = $usuarioDAO->salvar($usuario);
    
    if ($verificar) {
     
        // Gerando o hash com base
            $id_usuario = $_SESSION["id"];
            $md5 = md5($id_usuario);

            $link = "http://localhost/Gerenciador/conexao/confirma-email.php?h=".$md5;


            // Crie uma nova instância do PHPMailer
            $mail = new PHPMailer;
            //Tell PHPMailer to use SMTP
            $mail->isSMTP();
            //Enable SMTP debugging
            // SMTP::DEBUG_OFF = off (for production use)
            // SMTP::DEBUG_CLIENT = client messages
            // SMTP::DEBUG_SERVER = client and server messages
            $mail->SMTPDebug = 0;
            //Set the hostname of the mail server
            $mail->Host = 'smtp.gmail.com';
            // use
            // $mail->Host = gethostbyname('smtp.gmail.com');
            // if your network does not support SMTP over IPv6
            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;
            //Set the encryption mechanism to use - STARTTLS or SMTPS
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;
            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = "oreondevelop@gmail.com";
            //Password to use for SMTP authentication
            $mail->Password = "fernanda22";
            //Set who the message is to be sent from
            $mail->setFrom('oreondevelop@gmail.com', 'Conta Finance');
            //Set an alternative reply-to address
            // $mail->addReplyTo('oreondevelop@gmail.com', 'Suporte');
            //Set who the message is to be sent to
            $mail->addAddress($email, 'Suporte');
            //Set the subject line
            $mail->Subject = 'Clique para ativar sua conta';
             $mail->isHTML(true);
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            // $mail->msgHTML(file_get_contents('contents.php'), __DIR__);
            $mail->Body = '
            <div align="center">
                <div style="border: 1px solid #ccc; width: 85%;">
                    <div style="background-color: #137dee; color: #fff; font-weight: 900; text-transform: uppercase; text-align: center; padding: 2px;">
                        <p>Conta Finance</p>
                    </div>
                    <div style="padding: 3%; box-sizing: border-box;" align="center">
                        <p><strong>Olá, '.$nome.' '.$sobrenome.'</strong></p>
                        <p style="line-height: 25px; margin-bottom: 3%;">Falta apenas um passo para finalizar o seu cadastro.
                            <br><strong>Confirme seu e-mail</strong> para ativar sua Conta Finace.</p>
                        <br>
                        <br>

                        <div style="margin-bottom: 5%;">
                            <a href="'.$link.'" style="background-color: #137dee; color: #fff; padding: 12px 25px; text-align: center; text-transform: uppercase; font-weight: 700; text-decoration: none; font-size: 13px;">Confirmar email</a>
                        </div>
                        <br>
                        <br>
                        <div>
                            <p style="font-size: 14px; opacity: .7;">Se tiver problemas, copie e cole o link abaixo em outra janela do seu navegador:</p>
                            <a href="'.$link.'" style="font-size: 12px; text-decoration: none;">'.$link.'</a>
                        </div>
                        <hr style="width: 70%; margin-top: 20px; margin-bottom: 20px;">
                        <p style="text-align: center; opacity: .7; font-size: 13px;">EQUIPE FINANCE</p>
                    </div>
                </div>
            </div>';
            //Replace the plain text body with one created manually
            $mail->AltBody = 'Clique para ativar sua conta';
            //Attach an image file
            // $mail->addAttachment('images/phpmailer_mini.png');
            //send the message, check for errors
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                header('location: ../view/confirmar-email.php');
            }
        }else{
            $_SESSION['message'] = "Este email já está registrado.";
            $_SESSION['msg_type'] = "danger";
            header('location: ../view/register.php');
        }
        
    } else {
         $_SESSION['message'] = "Este email já está registrado.";
         $_SESSION['msg_type'] = "danger";
        header('location: ../view/register.php');
    }
}

//Editar dados do usuario
if (isset($_POST['editar_email'])) {
    
    //Recuperar dados do formulário
    $email = addslashes($_POST['email']);
    
    $usuario    = new Usuario();
    $usuarioDAO = new UsuarioDAO();
    
    
    $usuario->setEmail($email);
    
    $check = $usuarioDAO->alterarEmail($usuario);
    
    if ($check) {
        $_SESSION['message']  = "Seu e-mail foi alterado ";
        $_SESSION['msg_type'] = "success";
        header('location: ../view/perfil.php');
    } else {
        $_SESSION['message']  = "Não foi possível alterar seu e-mail.";
        $_SESSION['msg_type'] = "danger";
    }
    
}
//Alterar senha do usuario
if (isset($_POST['alterar_senha'])) {
    
    //Recuperar dados do formulário
    $senha       = addslashes(md5($_POST['senha']));
    $senha_reset = addslashes(md5($_POST['senha_reset']));
    
    $usuario    = new Usuario();
    $usuarioDAO = new UsuarioDAO();
    
    
    $usuario->setSenha($senha);
    
    if ($senha == $senha_reset) {

        $check = $usuarioDAO->alterarSenha($usuario);

        if ($check) {
            $_SESSION['message']  = "Sua senha foi alterada ";
            $_SESSION['msg_type'] = "success";
            header('location: ../view/perfil.php');
        } 
    } else {
        $_SESSION['message']  = "Não foi possível alterar sua senha.";
        $_SESSION['msg_type'] = "danger";
        header('location: ../view/perfil.php');
    }
}
?>