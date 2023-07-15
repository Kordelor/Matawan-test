<?php
    
    $request_method = $_SERVER["REQUEST_METHOD"];
    //print_r("toto = " . $request_method . "\n");

    /** return the result */
    function postResults($resultCards){
        $result = "";
        
        
        foreach($resultCards as $card){
        
            switch($card["type"]){
                case 'bus':
                    $result = $result . "<p>Take bus ".$card["number"]." from ". $card["from"] . " to " . $card["to"] . "." .($card["seat"] !== '' ? "Sit in seat ".$card["seat"] : " No seat assignment")."</p>";
                    break;
                case 'train':
                    $result = $result . "<p>Take train ".$card["number"]." from ". $card["from"] . " to " . $card["to"] . "." .($card["seat"] !== '' ? "Sit in seat ".$card["seat"] : " No seat assignment")."</p>";
                    break;
                case 'flight':
                    $result = $result ."<p>From ".$card["from"].", take flight ".$card["number"]. " to " . $card["to"] . ".Gate ".$card["gate"].", seat " .$card["seat"] . "." .($card["ticketCounter"] !== '' ? " Baggage drop at ticket counter ".$card["ticketCounter"] : " Baggage will we automatically transferred from your last leg.")."</p>";
                    break;
            }
        }
        $result = $result . "<p>You have arrived at your final destination."."</p>";


        header('Content-Type: application/json');
        echo json_encode($result);
    }


    
    function sortCardsStart ($CardsToTest1, $CardsToTest2){
        if ($CardsToTest1['to'] == $CardsToTest2['from']){
            return -1;
        }else{
            return 1;
        }
    }
    
    function sortCards ($CardsToSort)
    {
        
        usort($CardsToSort, 'sortCardsStart');
        postResults($CardsToSort); 
    }
    
    /* Select data from query to sort */
    function postSelectData(){
        $data = $_POST["data"];
        sortCards (json_decode($data, true));
    }

    switch($request_method)
	{
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			postSelectData();
			break;		
	}

    
?>