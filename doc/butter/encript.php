<?php
function Encrypt($str)
{
    $key = hash('sha256', "123456789");
    $iv = substr(hash('sha256',  "#@$%^&*()_+=-"), 0, 32)    ;

    return str_replace("=", "", base64_encode(
                 openssl_encrypt($str, "AES-256-CBC", $key, 0, $iv))
    );
}


function Decrypt($str)
{
    $key = hash('sha256', "123456789");
    $iv = substr(hash('sha256',  "#@$%^&*()_+=-"), 0, 32);

    return openssl_decrypt(
            base64_decode($str), "AES-256-CBC", $key, 0, $iv
    );
}
/*
$secret_key = "123456789";
$secret_iv = "#@$%^&*()_+=-";

$encrypted = Encrypt($str, $secret_key, $secret_iv);
$decrypted = Decrypt($encrypted, $secret_key, $secret_iv);
*/
?>
