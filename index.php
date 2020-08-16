<?php
// PHP Credit Card Validator from made in PHP.
// For testing purposes you can use the following Examples

// Mastercard
// ----------
// Pattern: "/5[1-5][0-9]{14}/"
// Examples:
// 5111111111111111
// 5522111111111111

// Visa
// ----------
// Pattern: "/4[0-9]{12}([0-9]{3})?([0-9]{3})?/"
// Examples:
// 4004571528446170
// 4500040443327765


$feedback = "";
$success_message = "Thank you for your donation!";
$error_message = "* There was an error with your card. Please try again.";
$error_amount = "* Please enter an amount";

$card_type = "";
$card_num = "";
$donation_amount = "";
$mc_regex = "/5[1-5][0-9]{14}/";
$visa_regex = "/4[0-9]{12}([0-9]{3})?([0-9]{3})?/";
$donation_regex = "/^[1-9]\d*$/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_type = $_POST["credit"];
    $card_num = $_POST["card-num"];
    $donation_amount = $_POST["amount"];

    if (preg_match($donation_regex, $donation_amount)) {

  if (strlen($card_num) < 100) {
    
    if ($card_type === "mastercard") {
      if (preg_match($mc_regex, $card_num)) {
        $feedback = $success_message;
        
      } else {
        $feedback = $error_message;
      }
    }
if ($card_type === "visa") {
      if (preg_match($visa_regex, $card_num)) {
        $feedback = $success_message;
      } else {
        $feedback = $error_message;
      }
    }
}  else {
    $feedback = $error_message;
} 

}
   
else {
    $feedback = $error_amount;
    }

  
}
?>
<form action="" method="POST">
  <h1>Make a donation</h1>
    <label for="amount">Donation amount?</label>
      <input type="number" name="amount" value="<?= $donation_amount;?>">
      <br><br>
    <label for="credit">Credit card type?</label>
      <select name="credit" value="<?= $card_type;?>">
        <option value="mastercard">Mastercard</option>
        <option value="visa">Visa</option>
      </select>
      <br><br>
      <label for="card-num">Card number?</label>
      <input type="number" name="card-num" value="<?= $card_num;?>">
      <br><br>   
      <input type="submit" value="Submit">
</form>
<span class="feedback"><?= $feedback;?></span>

<p>
// PHP Credit Card Validator from made in PHP.<br>
// For testing purposes you can use the following Examples<br>
<br>
// Mastercard<br>
// ----------<br>
// Pattern: "/5[1-5][0-9]{14}/"<br>
// Examples:<br>
// 5111111111111111<br>
// 5522111111111111<br>
<br>
// Visa<br>
// ----------<br>
// Pattern: "/4[0-9]{12}([0-9]{3})?([0-9]{3})?/"<br>
// Examples:<br>
// 4004571528446170<br>
// 4500040443327765<br>
</p>