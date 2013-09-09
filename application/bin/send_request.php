<?php

if (empty($argv[1]))
{
    echo "Parameter needed: e.g. http://example.com\n";
    return 0;
}

$ch = curl_init();
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_URL, $argv[1]);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'HEAD');

$response = curl_exec($ch);

echo $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
echo substr($response, 0, $header_size);
echo substr($response, $header_size);
