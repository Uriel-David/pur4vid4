<?php
// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php
use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Recebe as informações do formulário
$name = $_POST['name'];
$email = $_POST['email'];
$addInformation = $_POST['addInformation'];
$modelSize = $_POST['modelSize'];
$ass = $_POST['ass'];

// Inicia a classe PHPMailer
$mail = new PHPMailer();

// Método de envio
$mail -> IsSMTP();

// Enviar por SMTP
$mail -> Host = "smtp.gmail.com";

// Você pode alterar este parametro para o endereço de SMTP do seu provedor
$mail -> SMTPSecure = 'tls';
$mail -> Port = 587;

// Usar autenticação SMTP (obrigatório)
$mail -> SMTPAuth = true;

// Usuário do servidor SMTP (endereço de email)
// obs: Use a mesma senha da sua conta de email
$mail -> Username = 'uriel.david.qaa@gmail.com';
$mail -> Password = 'Purumal10!';

// Configurações de compatibilidade para autenticação em TLS
$mail -> SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );

// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro.
//$mail->SMTPDebug = 2;

// Define o remetente
// Seu e-mail e nome
$mail -> setFrom($email, $name);

// Define o(s) destinatário(s)
$mail -> AddAddress('uriel.david.qaa@gmail.com', 'Pur4Vid4 Surfboards');

// Opcional: mais de um destinatário
// $mail->AddAddress('exemplo@email.com');

// Opcionais: CC e BCC
// $mail->AddCC('joana@provedor.com', 'Joana');
// $mail->AddBCC('roberto@gmail.com', 'Roberto');

// Definir se o e-mail é em formato HTML ou texto plano
// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
$mail -> IsHTML(true);

// Charset (opcional)
$mail -> CharSet = 'UTF-8';

// Assunto da mensagem
$mail -> Subject = "$ass + ($name)";

// Corpo do email
$mail -> Body = "$addInformation + $email";

// Opcional: Anexos
// $mail -> AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf");

// Envia o e-mail
// Exibe uma mensagem de resultado
try {
    $enviado = $mail -> Send();
    if ($enviado)
    {
        echo "Seu email foi enviado com sucesso!";
    } else {
        echo "Houve um erro enviando o email: ".$mail -> ErrorInfo;
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


