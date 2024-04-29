<?php

function encryptId($id)
{

    $cipher = getCipherConfig();
    $cipheredId = openssl_encrypt($id, $cipher['method'], $cipher['key'], $cipher['options'], $cipher['iv'], $tag);
    return $cipheredId;
}
function decryptId($cipherId)
{
    $cipher = getCipherConfig();
    $decipheredId = openssl_decrypt($cipherId, $cipher['method'], $cipher['key'], $cipher['options'], $cipher['iv']);
    return $decipheredId;
}

function getCipherConfig()
{
    $cipher['key'] = 'JdtJDt204@#rfLGIT3209dOD@$(F)SKOW24))(@@KS';
    $cipher['iv'] = '12p*KGsfj2WWOr80';
    $cipher['method'] = 'aes-128-cbc';
    $cipher['options'] = 0;
    return $cipher;
}

// $id = encryptId(13);
// decryptId($id);
