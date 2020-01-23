<!DOCTYPE html>
<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
   
  </head>

  <body>
    <?php

    if(isset($_POST['submit']))
    {
      $answer_key = $_POST['answer_key'];
      $give_ans = $_POST['give_ans'];
      $diff  = 0;


      $give_ans_arr = explode(" ",trim($give_ans));
      // print_r($give_ans_arr);
      $answer_key_arr = explode(" ",trim($answer_key));
      // print_r($answer_key_arr);
      $extracounterror = 0;
      if(count($give_ans_arr )> count($answer_key_arr ))
      {
         $extracounterror = count($give_ans_arr ) - count($answer_key_arr );
      }
     
      $error = 0;
      $error = $error + $extracounterror;
      $not_match_array=array();
      $result_match_arr_ocuurence=array();
      $old_match_arr_ocuurence=array();
      $half_match_array=array();
      $half_match_array_with_same_letter_diff_order=array();
      $half_match_array_camal_case=array();
      $match_array = array();
      $ocurrence_diff_error = array();


//We will convene an all party conference on electoral reform to forge a consensuses on all aspects of electoral reform, including criminalization of political process

//We  convene will an all party conference on electoral reform to forge a consensuses on all aspects of electoral reform, including criminalization of political process
      $give_index = 0;
      $ans_index = 0;
      $i = 0;
      $j = 0;

      $kcount = 0; 
      echo "kmaincount".$kmaincount = count($answer_key_arr); 
      echo '<br>';

      $scount = 0; 
      echo "smaincount".$smaincount = count($give_ans_arr); 
      echo '<br>';
      for ($i=0; $i < $smaincount; $i++) { 
        
        if($give_ans_arr[$i]==$answer_key_arr[$kcount])
        {
          $match_array[] = $answer_key_arr[$kcount];
          $kcount++;
        }
        else{
          if($give_ans_arr[$i] != $answer_key_arr[$kcount])
          {
            if($give_ans_arr[$i][0] == $answer_key_arr[$kcount][0])
            {
            $not_match_array[] = $answer_key_arr[$kcount];
            }
            else
            {
              if($give_ans_arr[$i] != $answer_key_arr[$kcount])
              $not_match_array[] = $answer_key_arr[$kcount];
              // break;
            }
          }
          
          $kcount++;
          // if($give_ans_arr[$i]==$answer_key_arr[$kcount])
          // {
          //   $match_array[] = $answer_key_arr[$kcount];
            
          // }
          // while ($kcount<=$kmaincount) {
          //   if($give_ans_arr[$i]==$answer_key_arr[$kcount])
          //   {
          //     $match_array[] = $answer_key_arr[$kcount];
          //     $kcount++;
          //     break;
          //   }
          //   else{
          //     $not_match_array[] = $answer_key_arr[$kcount];
          //     $kcount++;
          //   }
          // }
        }

      }
          // echo "====================================";
       // echo '<br>';
      // echo "result_match_arr_ocuurence";
      // print_r($result_match_arr_ocuurence);
      // echo '<br>';
      //  echo "====================================";
      //  echo '<br>';
      // echo "old_match_arr_ocuurence";
      // print_r($old_match_arr_ocuurence);
      // echo '<br>';
      echo '<pre>';
      // echo "====================================";
      echo '<br>';
      echo "not_match_array";
      print_r($not_match_array);
      echo '<br>';
      // echo "====================================";
      // echo '<br>';
      // echo "half_match_array_with_same_letter_diff_order";
      // print_r($half_match_array_with_same_letter_diff_order);
      // echo '<br>';
      // echo "====================================";
      // echo '<br>';
      // echo "half_match_array_camal_case";
      // print_r($half_match_array_camal_case);
      // echo '<br>';
      // echo "====================================";
      echo '<br>';
      echo "match_array";
      print_r($match_array);
      echo '<br>';
      // echo '<br>';
      // echo "====================================";
      // echo '<br>';
      // print_r($give_ans_arr);
      // print_r($give_array_traverse);
    }  
    ?>

   <form method="post" action="">
          <p><i>We will convene an all party conference on electoral reform to forge a consensuses on all aspects of electoral reform, including criminalization of political process</i></p>
         <input type="hidden" name="answer_key" id="answer_key" value="We will convene an all party conference on electoral reform to forge a consensuses on all aspects of electoral reform, including criminalization of political process">
          <textarea id="field" name="give_ans" cols="100" rows="10" charswidth="23" ></textarea><br>
          <input type="submit" name="submit" value="Test Result">
    </form>
    <div id="charNum"></div>
    <div id="demo"></div>


    <?php

    
    function compareStrings($s1, $s2) {
        $m = 0;
        $n = 0;
        $s_arr1 = str_split($s1);
        foreach ($s_arr1 as $key => $value) {
          // echo '<br>';
          // echo $s2."=".$value;
          // echo '</br>';
          if ( strpos($s2, $value) !== false )
          {
            $m++;
          }
          else{
            $n++;
          }
        }
        $s1len = strlen($s1);

        return (100/$s1len) * ($m-$n);
    }
    ?>
  </body>

</html>