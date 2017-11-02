<?php

function uniqueString()
{
    $str = implode('', [
       bin2hex(random_bytes(4)),
       bin2hex(random_bytes(2)),
       bin2hex(chr((ord(random_bytes(1)) & 0x0F) | 0x40)).bin2hex(random_bytes(1)),
       bin2hex(chr((ord(random_bytes(1)) & 0x3F) | 0x80)).bin2hex(random_bytes(1)),
       bin2hex(random_bytes(6)),
   ]);

    return $str;
}
