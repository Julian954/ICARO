<?php // Utilizar los espacios de nombres necesarios

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

        /* Clase para tratar con excepciones y errores */
        require 'Assets/PHPMailer/src/Exception.php';
        /* Clase PHPMailer */
        require 'Assets/PHPMailer/src/PHPMailer.php';
        /*Clase SMTP necesaria para conectarte a un servidor SMTP */
        require 'Assets/PHPMailer/src/SMTP.php';

        // Crear una instancia de PHPMailer
        $mail = new PHPMailer(true);

        // Configurar el servidor SMTP externo
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465; // Puerto SMTP (puede variar según el proveedor)
        $mail->SMTPAuth = true;
        $mail->Username = 'miguel20010807@gmail.com';
        $mail->Password = 'nientvltlzwsnknu';
        $mail->SMTPSecure = 'ssl';
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);


        // Establecer otros parámetros del correo
        $mail->setFrom('miguel20010807@gmail.com', 'Jordán Rodríguez');
        $mail->addAddress('mrodriguez74@ucol.mx', 'Jordán Rodríguez');
        $mail->Subject = 'ICARO';
        $mail->Body = 'Prueba correo 1';

        // Enviar el correo
        if ($mail->send()) {
            echo 'El correo ha sido enviado correctamente.';
        } else {
            echo 'Hubo un error al enviar el correo: ' . $mail->ErrorInfo;
        }

    ?>