<?php
function generateCaptcha($length=6){
    $characters='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $captcha=' ';
    for($i=0;$i<$length;$i++){
        $index=rand(0,strlen($characters)-1);
        $captcha.=$characters[$index];
    }
    return $captcha;
}
echo "Generated CAPTCHA:".generateCaptcha(6);
?>