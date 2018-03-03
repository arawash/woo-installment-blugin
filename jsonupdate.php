<?php




{
	"durs": [{
		"monthes": 6
	}, {
		"monthes": 12
	}, {
		"monthes": 18
	}, {
		"monthes": 24
	}],
	"categs": {
		"one": {
			"id":1,
			"type": "air_caonditaner",
			"installmentDuration": [0.15, 0.390, 0.48, 0.55]
		},
		"two": {
			"id":2,
			"type": "phones",
			"installmentDuration": [0.15, 0.30, 0.48, 1.55]
		},
		"three": {
			"id":3,
			"type": "home",
			"installmentDuration": [0.15, 0.30, 0.48, 3.55]
		}
	}
}



               /* post data to json file*/
               $url = plugin_dir_url(__FILE__) . '/jsonupdate.php';
               $body = ?> JSON.decod (<?php echo json_encode($resBody) ?>
                                $response = wp_remote_post( $url, array(
                                    'method'      => 'POST',
                                    'timeout'     => 45,
                                    'redirection' => 5,
                                    'httpversion' => '1.0',
                                    'blocking'    => true,
                                    'headers'     => array(),
                                    'body'        => $body
                                    array(
                                        'username' => 'bob',
                                        'password' => '1234xyz'
                                    ),
                                    'cookies'     => array()
                                    )
                                );
                                
                                if ( is_wp_error( $response ) ) {
                                    $error_message = $response->get_error_message();
                                    echo "Something went wrong: $error_message";
                                } else {
                                    echo 'Response:<pre>';
                                    print_r( $response );
                                    echo '</pre>';
                                }
            ?>
?>