<?php
    
    $returnCards = array();
    $request_method = $_SERVER["REQUEST_METHOD"];
    //print_r("toto = " . $request_method . "\n");

    function SortCards ($CardsToSort)
    {
        //$returnCards = array();
        // $SortByFrom = 

        for ($i=0; $i < sizeof($CardsToSort); $i++){
            
            // echo ("<pre>");
            // print_r($CardsToSort[$i]);
            // echo("</pre>");
                      
            foreach ($CardsToSort as $CardsToSortElement){
                if ($CardsToSort[$i]["from"] === $CardsToSortElement["to"]){
                    //$returnCards= $CardsToSort[$i];
                    echo ("<pre> loop : ");
                    print_r($CardsToSortElement);
                    echo("</pre>");
                    break;
                }
                 else{
                    
                     $returnCards[]= $CardsToSort[$i];
                     //array_push($returnCards[], $CardsToSort[$i]);
                }   
            }
        }

         echo ("<pre>returnCards");
         print_r($returnCards);
         echo("</pre>");

        // foreach ($CardsToSort as $CardsToSortElement){
        //     echo ("<pre> loop : ");
        //     print_r($CardsToSortElement);
        //     echo ("array_pop ");
        //     print_r(sizeof($returnCards));
        //     if(sizeof($returnCards)==1){
        //         print_r($returnCards);
        //     }else {
        //         print_r(array_key_last($returnCards));
        //     }

        //     echo("</pre>");
            
        //     // if ($CardsToSort[$i]["from"] !== $CardsToSortElement["to"]){
        //     //     $returnCards= $CardsToSort[$i];
                
        //     // }
        //     // else{
                
        //     //     $returnCards= $CardsToSort[$i];
        //     //     //array_push($returnCards, $CardsToSort[$i]);
        //     // }   
        // }
        




        
    }
    
    function addCards(){

        $data = $_POST;
        SortCards ($data);

    }

    switch($request_method)
	{
		
		// case 'GET':
		// 	// Retrive Products
		// 	if(!empty($_GET["id"]))
		// 	{
		// 		$id=intval($_GET["id"]);
		// 		getProduct($id);
		// 	}
		// 	else
		// 	{
		// 		getProducts();
		// 	}
		// 	break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			// Ajouter un produit
			addCards();
			break;
			
		// case 'PUT':
		// 	// Modifier un produit
		// 	$id = intval($_GET["id"]);
		// 	updateProduct($id);
		// 	break;
			
		// case 'DELETE':
		// 	// Supprimer un produit
		// 	$id = intval($_GET["id"]);
		// 	deleteProduct($id);
		// 	break;

	}

    
?>