<?php 
require 'vendor/autoload.php';

class SendEmail{

    public static function SendMail($to,$subject,$content){
    
        $key='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';


        $email= new SendGrid\Mail\Mail();
        $email->setFrom("waynethomas098@gmail.com","wayne thomas");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain",$content);
        //$email->addContent("text/html",$content);

        $sendgrid= new\SendGrid($key);


        try{
            $response=$sendgrid->send($email);
            return $response;
        }
        catch(Exception $e){
        echo 'Caught exception:'. $e->getMessage()."\n";
        return false;
        }
        
    }
    
    
}
?>
