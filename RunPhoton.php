<?php

  $data = array ('args' => 'on');
	$data = http_build_query($data);

	$context_options = array (
        'http' => array (
            'method' => 'POST',
            'header'=> "Content-type: application/x-www-form-urlencoded\r\n"
                . "Content-Length: " . strlen($data) . "\r\n",
            'content' => $data
            )
        );

	$context = stream_context_create($context_options);
	$fp = fopen('https://api.particle.io/v1/devices/3d003d000a47343432313031/led?access_token=997c813e54c1d6e7fc6742846075369f8586dada', 'r', false, $context);

?>