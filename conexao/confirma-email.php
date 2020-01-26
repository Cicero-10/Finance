 <?php
	
	require_once 'Conexao.php';
	//Inicio Enviar e-mail
	require_once 'phpmailer/PHPMailerAutoload.php';
 	// $connect = new mysqli('localhost', 'root', '', 'financas')or die(mysql_error($mysqli));
 	$email = $_SESSION["emailCad"] ;

	$pdo = Conexao::getInstance();


	$h = $_GET['h'];

	if (!empty($h)) {

		$sql = " UPDATE usuario SET email_verificado_usu = '1', email_verificado_token_usu = '$h', clicks = clicks +1, ativo_usu = '1'  WHERE MD5(idusuario) = '$h'";

		$stmt = $pdo->prepare($sql);
		$stmt->execute();


		$select = $pdo->query(" SELECT * FROM usuario WHERE MD5(idusuario) = '$h' AND clicks = 1 ");
		$result = $select->fetch(PDO::FETCH_ASSOC);

		if ($result) {

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
            $mail->Subject = 'Bem-vindo(a) à sua Conta Finance';
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
                        <h1>Bem-vindo(a) à sua Conta Finance</h1>
                        <br>
                        <br>

                        <div style="margin-bottom: 5%;">
                           <img src="http://finance-com-br.umbler.net/vendor/img/capa.png" style="box-sizing: border-box;">
                        </div>
                        <br>
                        <br>
                        <div>
                           <p style="line-height: 25px; margin-bottom: 3%; font-size: 18px;">Seu cadastro foi concluído e agora você pode aproveitar ao máximo os nossos sites. Sempre que desejar alterar ou conferir seus dados, acesse a sua Conta Finance.</p>
                        </div>
                        <hr style="width: 70%; margin-top: 20px; margin-bottom: 20px;">
                        <p style="text-align: center; opacity: .7; font-size: 13px;">EQUIPE FINANCE</p>
                    </div>
                </div>
            </div>';
            //Replace the plain text body with one created manually
            $mail->AltBody = 'Bem-vindo(a) à sua Conta Finance';
            //Attach an image file
            // $mail->addAttachment('images/phpmailer_mini.png');
            //send the message, check for errors
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                header('location: ../view/etapas.php' );
            }
			
		}else{
			header('location: ../email-verificado_token.php');
		}

		
	}

	

	
	
	
?>
