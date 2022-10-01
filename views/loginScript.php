<?php 
echo var_dump($_POST);
if (isset($_POST['username']) && isset($_POST['password'])) {
    try {
        $db = new PDO('sqlite:user.db');
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($_POST('password'))
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */ }

        var_dump($result);
    }
    catch (error $e) {
        echo "Error connecting to database";
    }
}
else {
    echo "error occoured";
}
?>