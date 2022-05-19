<?php 


function clean($input){
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = stripcslashes($input);
        return $input;
}

function validation($input , $flag){   
$status = true;
    switch ($flag) {
        case 1:    
            if (empty($input)) {
               $status = false;
            }
            break;
        case 2:
            if (!filter_var($input , FILTER_VALIDATE_EMAIL)) {
                $status = false;
            }
            break;        
        
        case 3:
            if (!preg_match("/^[A-Za-z]*$/",$input)) {
                $status = false;
            }    
            break;

        case 4:
                if (!is_numeric($input)) {
                    $status = false;
                }
                break; 
        case 5:
                if (strlen($input) < 8) {
                    $status = false;
                }
                break;            

        case 6:
                if (strlen((string)$input) != 11) {
                    $status = false;
                }
                break;               

    }


    return $status;
}

?>