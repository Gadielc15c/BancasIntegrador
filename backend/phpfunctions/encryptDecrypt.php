<?php

//https://www.phpcluster.com/aes-encryption-and-decryption-in-php/

// Encriptacion 32 bytes = 256 bits 
$encryption_key = openssl_random_pseudo_bytes(32); //Esta cambia, por ende se deberia guardar en algun lado
var_dump($encryption_key); //tiene simbolos raros
echo "<br>";
$data = "Sample Text";
$cipher = "aes-256-cbc"; 
$iv_size = openssl_cipher_iv_length($cipher); 
$iv = openssl_random_pseudo_bytes($iv_size); 


function encriptar($encryption_key, $data, $cipher, $iv){
    $encrypted_data = openssl_encrypt($data, $cipher, $encryption_key, 0, $iv);
    echo "Encrypted Text: " . $encrypted_data; 
    return $encrypted_data;
}


function desencriptar($encryption_key, $encrypted_data, $cipher, $iv){
    $decrypted_data = openssl_decrypt($encrypted_data, $cipher, $encryption_key, 0, $iv); 
    echo "Decrypted Text: " . $decrypted_data; 
    return $decrypted_data;
}


$encrypted_data = encriptar($encryption_key, $data, $cipher, $iv);
echo "<br>";
desencriptar($encryption_key, $encrypted_data, $cipher, $iv);


?>