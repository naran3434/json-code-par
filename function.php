<?php
/**
 * Created by PhpStorm.
 * User: naran
 * Date: 30/11/18
 * Time: 8:20 AM
 */



/**
 * extract email and return email as string
 * @param $data
 * @return string
 */
function filterAndReturnEmailString($data){
    return implode(',',
        array_map(function($element){
            return $element->email;
        }, $data));
}

/**
 * usort callback to sort by descending
 * @param $a
 * @param $b
 * @return int
 */
function sortDesc($a, $b){
    return ($a->age > $b->age) ? -1 : 1;
}

/**
 * callback to Contact first and last name
 * @param $array
 * @return array
 */
function concatNames($array){
    $array->name = $array->first_name.' '. $array->last_name;
    return $array;
}

/**
 * process and return new sort, concat array
 * @param $data
 * @return array
 */
function sortAndConcatArray($data){
    usort($data, "sortDesc");
    array_map("concatNames", $data);
    return $data;
}


function taskLogic($data){
    if(isset($data->data)){
        //  convert array to comma separated value
        $emails = filterAndReturnEmailString($data->data);

        // sort and add name element
        $originalDataSorted = sortAndConcatArray($data->data);

        echo "A comma-separated list of email addresses : ";

        echo $emails;

        echo "<br><br>";

        echo "The original data, sorted by age descending, with a new field on each record called name which is the first and last name joined.";

        echo "<pre>"; print_r($originalDataSorted); echo "</pre>";
    } else {
        echo "Oops! Data key is not exists";
    }
}

