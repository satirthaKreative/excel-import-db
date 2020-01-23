<!DOCTYPE html>
<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
   
  </head>

  <body>
    <?php
    // $str = "Love a and peace love a and peace love a and peace love a and peace love a and peace love a and peace";
    $answer_key = "Sir, some people even go to the extent of saying that there should be laiseez faire, free trade, and there should not be any Government interference. This is one extreme view taken by a certain section of politicians and public opinion in our country"; 
    echo $answer_key."<br>";
    $give_ans = "Sir, some people even go to the extent of saying even go to the extent that there should be laiseez faire, free trade, and there should not be any Government interference. This is one extreme view taken by a certain section of politicians and public opinion in our country lovess you test lovess you jhasfg";
    echo $give_ans."<br>";

      $actual_answer_key = $answer_key;
      $actual_give_ans = $give_ans;

      $answer_comma_array=array();
      $give_comma_array=array();
      $answer_fullstop_array=array();
      $give_fullstop_array=array();
      $error = 0;


      $actual_give_ans = preg_replace('/\s+/', ' ', $actual_give_ans);

      $actual_answer_key = preg_replace('/\s+/', ' ', $actual_answer_key);

      $actual_give_ans_arr = explode(" ",trim($actual_give_ans));
      
      $actual_answer_key_arr = explode(" ",trim($actual_answer_key));
      
      $rep ='';
      for($i=0,$len=count($actual_give_ans_arr),$pattern=""; $i<$len; $i++) {
        $pattern.= $actual_give_ans_arr[$i].' ';
          if(substr_count($actual_give_ans,$pattern)>1){
            $rep = strlen($rep)<strlen($pattern) ? $pattern : $rep;
            $pattern_array[$i] = $pattern;
          }
          else{
            $pattern = "";
          }
        }
        //return $rep;

    

    echo " Longest pattern found: '".trim($rep)."'";
    echo "<pre>";
    print_r($pattern_array);

    $pattern_array = array();
    ?>
  </body>

</html>