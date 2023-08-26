<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blank Check</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: white;
  }

  .check {
    max-width: 800px;
    margin: 20px auto;
    background-color: white;
    border: 2px solid #ccc;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    position: relative;
  }

  .check-logo {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 120px;
    height: auto;
  }

  .payee-info {
    text-align: center;
    margin: 20px 0;
  }

  .amount {
    text-align: center;
    font-size: 36px;
    margin: 20px 0;
  }

  .memo {
    text-align: center;
    font-size: 18px;
    margin: 20px 0;
  }

  .bottom-info {
    display: flex;
    justify-content: space-between;
    margin-top: 40px;
    padding-top: 20px;
    border-top: 1px solid #ccc;
  }

  .bank-info {
    margin-top: 40px;
    border-top: 1px solid #ccc;
    padding-top: 20px;
    text-align: center;
  }
</style>
</head>
<body>
<?php $invoice = json_decode($invoices);  ?> 
  <div class="check">
    <!-- <img class="check-logo" src="your-logo.png" alt="Logo"> -->
      <strong><h2 class="payee-info">Samvedana Foundation</h2></strong>
    <div class="payee-info" style="margin-right: 500px;">
      <strong>Receipt No:</strong> <?php echo $invoice->Receipt_No; ?><br>
      <strong>Name:</strong><?php echo $invoice->Donor_Name; ?><br>
      <strong>Date: </strong><?php echo $datePortion = substr($invoice->updated_at, 0, 10);?>
    </div>
    <div class="amount">
      <span id="amount"><?php echo $invoice->Amount; ?>.00</span>
    </div>
    <div class="memo">
      Payment Method : <?php echo $invoice->Payment_Method; ?>
    </div>
    <div class="" style="margin-left: 450px;">
        <div>______________________</div><br>Authorized Signature
    </div>
    <div class="bank-info"> 
      <strong>Address: </strong><?php echo $invoice->Donor_Address; ?>&nbsp;&nbsp;&nbsp;&nbsp;
      <strong>Donor Pan No:</strong> <?php echo $invoice->Donor_Pan_No; ?> &nbsp;&nbsp;&nbsp;&nbsp;
      <strong>Donor Mobile:</strong> <?php echo $invoice->Donor_Mobile; ?>
    </div>
  </div>
</body>
</html>
