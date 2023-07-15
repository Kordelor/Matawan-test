<?php

    $url = 'http://matawan/api/cards';
    $data = array(['type' => 'flight','number'=>'SK22', 'from' => 'Stockholm', 'to' => 'New York JFK', 'seat'=>'7B', 'gate'=>'45b',  'ticketCounter'=>'' ],
                ['type' => 'flight','number'=>'SK455', 'from' => 'Gerona Airport', 'to' => 'Stockholm', 'seat'=>'3A', 'gate'=>'45b', 'ticketCounter'=>'344' ],
                ['type' => 'bus','number'=>'', 'from' => 'Barcelona', 'to' => 'Gerona Airport', 'seat'=>''],
                ['type' => 'train','number'=>'78A', 'from' => 'Madrid', 'to' => 'Barcelona', 'seat'=>'45b']
            );  
    $dataString = '[{"type":"flight","number":"SK22","from":"Stockholm","to":"New York JFK","seat":"7B","gate":"45b","ticketCounter":""},
                    {"type":"flight","number":"SK455","from":"Gerona Airport","to":"Stockholm","seat":"3A","gate":"45b","ticketCounter":"344"},
                    {"type":"bus","number":"","from":"Barcelona","to":"Gerona Airport","seat":""},
                    {"type":"train","number":"78A","from":"Madrid","to":"Barcelona","seat":"45b"}]';  
    // Envoie de la requette
    $options = array(
        'http' => array(
            'header' => "content-type: application/x-www-form-urlencoded",
            'method' => 'POST',
            //'content' => http_build_query($data)
            'content' => 'data='.$dataString
        )
    );
    $context = stream_context_create($options, $data );
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE){

    
    }
    //var_dump("toto");
    echo ("<pre>");
    print_r($result);
    echo("</pre>");
    
?>
