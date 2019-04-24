<form id="form" method="GET" return true">
    <label class="form">Booking date</label><input type="date" name="input1" id="input1">
    <button id="submit" type="submit" value="submit" disabled="disabled">Submit</button>
    </form>

<?php
        date_default_timezone_set("Asia/Kolkata");
        if (isset($_GET['input1'])) {
                $postedDate = $_GET["input1"];	
                $plusMinus = '-120 day'; 
                $msg = "Booking for $postedDate can be done from " ;
                $end=" 08:00 AM IST";
            }
        else { 
            $postedDate = date('Y-m-d'); 
            $plusMinus = '+120 day';	
            $msg = "Today you can book tickets for journey date till ";
            $end=''; 

            }

        $date = new DateTime($postedDate);
        $date->modify($plusMinus);
        echo  $msg.$date->format('l d-M-Y').$end;
   
?>


    <script>
    var inputs = document.querySelectorAll('#form input');

var validateInput1 = function()
{
  return document.getElementById('input1').value != '';
}
var validateForm = function() {

  if ( !validateInput1() ) {
    return false;
  }
  return true;
}

for ( var i = 0, len = inputs.length; i < len; i++ )
{
  var checkValid = function() {
    document.getElementById('submit').disabled = !validateForm();
    
    //Is the same as:
    /*if ( !validateForm() )
    {
      document.getElementById('submitButton').disabled = true;
    }
    else
    {
      document.getElementById('submitButton').disabled = false;
    }*/
  }
  
  inputs[i].addEventListener('change', checkValid);
  inputs[i].addEventListener('keyup', checkValid);
}
    </script>
