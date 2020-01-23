<!DOCTYPE html>
<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
   
  </head>

  <body>
    <?php
    // $str = "Love a and peace love a and peace love a and peace love a and peace love a and peace love a and peace";
    $answer_key = "Sir, some people even go to the extent of saying that there should be laiseez faire, free trade, and there should not be any Government interference. This is one extreme view taken by a certain section of politicians and public opinion in our country";

    $give_ans = "Sir, some people even go to the extent of saying even go to the extent that there should be laiseez faire, free trade, and there should not be any Government interference. This is one extreme view taken by a certain section of politicians and public opinion in our country lovess you test lovess you jhasfg";


      $actual_answer_key = $answer_key;
      $actual_give_ans = $give_ans;

      // $answer_comma_array=array();
      // $give_comma_array=array();
      // $answer_fullstop_array=array();
      // $give_fullstop_array=array();
      // $error = 0;


      $actual_give_ans = preg_replace('/\s+/', ' ', $actual_give_ans);

      $actual_answer_key = preg_replace('/\s+/', ' ', $actual_answer_key);

      $actual_give_ans_arr = explode(" ",trim($actual_give_ans));
      
      $actual_answer_key_arr = explode(" ",trim($actual_answer_key));
       echo "===========================================";

      echo $actual_give_ans;

      echo "===========================================";
      echo '<br>';

      $findme1 = repeated($actual_answer_key_arr,$actual_answer_key);
      echo '<br>';
      $findme2  = repeated($actual_give_ans_arr,$actual_give_ans);
      echo "===========================================";
      echo '<br>';


      
      $pos = strpos($actual_give_ans, $findme2);

      // if ($pos === false) {
      //     echo "The string '$findme2' was not found in the string";
      // } else {
      //     echo "The string '$findme2' was found in the string";
      //     echo " and exists at position $pos";
      // }
      //  echo "===========================================";
      // echo '<br>';

      $html = $actual_answer_key;
      $needle = $findme2;
      $lastPos = 0;
      $positions = array();

      while (($lastPos = strpos($html, $needle, $lastPos))!== false) {
          $positionsold[] = $lastPos;
          $lastPos = $lastPos + strlen($needle);
      }

      print_r($positionsold);
      foreach ($positionsold as $value) {
          echo $value ."<br />";
      }
       echo "===========================================";
      echo '<br>';

      $findmelenth = 0;
      $html = $actual_give_ans;
      $needle = $findme2;
      $findmelenth = strlen($findme2);
      $lastPos = 0;
      $positions = array();

      while (($lastPos = strpos($html, $needle, $lastPos))!== false) {
          $positionsgiven[] = $lastPos;
          $lastPos = $lastPos + strlen($needle);
      }
      print_r($positionsgiven);
      foreach ($positionsgiven as $value) {
          echo $value ."<br />";
      }

      if( count($positionsgiven) > count($positionsold) )
      {
        $diff_array = array_diff($positionsgiven, $positionsold);
      }
      $omision_array = array();
      print_r( $diff_array);

      

     for ($i=1; $i <= count($diff_array); $i++) { 
       
       $omision_array[$diff_array[$i]] = $findmelenth;

     }
     print_r($omision_array);

     $string_without_repeatetion = '';


     $give_ans_splite = str_split($give_ans);
     $i = 0;
     while ( $i<= strlen($give_ans)) {

        if(array_key_exists($i, $omision_array))
        {
          $i = $i + $omision_array[$i];
        }
        else{
          if(array_key_exists($i, $give_ans_splite))
          {
            $string_without_repeatetion .= $give_ans_splite[$i];

          }
          $i++;
          
        }
       # code...
     }
      echo "<br>Actual</b>";
      echo $answer_key."<br/>";
     echo "<br>Old<br>";
     echo $give_ans ;
     echo "<br><br>";
     echo "<br>New<br>";
     echo $string_without_repeatetion;
     echo "<br><br>";



    function repeated($array,$str)
    {
      $rep ='';
      for($i=0,$len=count($array),$pattern=""; $i<$len; $i++) {
        $pattern.= $array[$i].' ';
          if(substr_count($str,$pattern)>1){
            $rep = strlen($rep)<strlen($pattern) ? $pattern : $rep;
            $pattern_array[$i] = $pattern;
          }
          else{
            $pattern = "";
          }
        }
        return $rep;
    }

    

    // echo " Longest pattern found: '".trim($rep)."'";
    // print_r($pattern_array);

    // $pattern_array = array();
    ?>
  </body>

</html>