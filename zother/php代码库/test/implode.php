<?php
$arr = array("a"=>"1","b"=>2);
var_dump(implode(',',$arr));

function implode_ea($glue_punct, $glue_word, $array) {
   // Implode the entire array
   $result = implode($glue_punct, $array);

   // Check the length of the array
   if(count($array) > 1) {
       // Calculate the amount needed to trim
       $trimamount = strlen($array[count($array) - 1]) + strlen($glue_punct);

       // Trim the imploded string
       $result = substr($result, 0, strlen($result) - $trimamount); // PHP 4 compatible
       $result = "$result $glue_word " . $array[count($array) - 1];

       // Return the result
       return $result;
   } else {
       // In this case, the array cannot be splitted by a
       // word or punctuation, because it is too small.
       return $result;
   }
}

echo implode_ea(", ", "and", array("one", "two", "three", "four"));

?>