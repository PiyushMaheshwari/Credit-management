<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
</head>
<body>
<div class="w3-bar w3-teal w3-mobile">
  <a href="index.php" class="w3-bar-item w3-button">Home</a>
  <button onclick="document.getElementById('users').style.display='block'"
class="w3-button">All Users</button>
  <button onclick="document.getElementById('thistory').style.display='block'" class="w3-button">Transaction History</button>
</div>
<div class="w3-content w3-display-container w3-mobile" style="width: 100%;padding-top: 1%">

<div class="w3-display-container mySlides">
  <img src="jeff.png" style="width:100%;padding-top: 2%">
  <div class="w3-display-topleft w3-large w3-container w3-padding-32 w3-text-black w3-opacity-min">
  <span style="font-size:100px">&#10077;</span>
  <p style="margin-top:-60px">
  <i><b>One of the only ways to get out of<br/>a tight box is to invent your way out.”</b></i></p>
  </div>
</div>

<div class="w3-display-container mySlides">
  <img src="bill.png" style="width:100%;height: 90%">
  <div class="w3-display-topright w3-large w3-container w3-padding-32 w3-text-black w3-opacity-min">
  <span style="font-size:100px">&#10077;</span>
  <p style="margin-top:-60px">
  <i><b>If you are born poor it’s not your mistake, <br/>but if you die poor it’s your mistake.</b></i></p>
  </div>
</div>

<div class="w3-display-container mySlides">
  <img src="w2.png" style="width:100%;height: 90%">
  <div class="w3-display-topleft w3-large w3-container w3-padding-32 w3-text-white w3-opacity-min">
  <span style="font-size:100px">&#10077;</span>
  <p style="margin-top:-60px">
  <i><b>I measure success by how <br/>many people loves me."</b></i></p>
  </div>
</div>

<button class="w3-button w3-display-left w3-black " onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right w3-black " onclick="plusDivs(1)">&#10095;</button>

</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

<!-- The Modal -->
<div id="thistory" class="w3-modal w3-mobile">
  <div class="w3-modal-content">
    <div class="w3-container" style="width: 100%;height: 75%;overflow:auto;">
      <span onclick="document.getElementById('thistory').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
    <table class="w3-table w3-card-4 w3-striped w3-border">
    <h3 class="w3-center"> Transaction History </h3>
    <tr>
        <th>Payer</th>
        <th>Payee</th>
        <th>Amount</th>
        <th>Date</th>
    </tr>

    <?php
        include 'dbconnection.php';
        $q = "SELECT * FROM transactions";
        $query=mysqli_query($conn,$q);
        if(!$query)
        {
            echo "Error ".$q."<br/>".mysqli_error($conn);
        }
        while($res = mysqli_fetch_array($query)) {
    ?>
        <tr>
        <td><?php echo $res['sname']; ?></td>
        <td><?php echo $res['rname']; ?></td>
        <td><?php echo $res['amount']; ?></td>
        <td><?php echo $res['time']; ?></td>
        </tr>
    <?php 
        }
    ?>
    </table>
    </div>
  </div>
</div>

<!-- The Modal -->
<div id="users" class="w3-modal w3-mobile">
  <div class=" w3-modal-content w3-card-4 w3-light-blue" style="width:50%;margin-top:-2%;margin-left:25%;">
    <div class="w3-container">
      <span onclick="document.getElementById('users').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <br/><br/>
            <p class="w3-xlarge" style="margin-left: 45%;margin-top:-3%"> USERS </p>
    <ul class="w3-ul w3-card-4 w3-white" style="margin-left:4%;margin-right:4%;overflow:auto;height:60%">

    <?php
        include 'dbconnection.php';
        $q = "SELECT * FROM allusers";
        $query=mysqli_query($conn,$q);
        if(!$query)
        {
            echo "Error ".$q."<br/>".mysqli_error($conn);
        }
        while($res = mysqli_fetch_array($query)) {
    ?>
        <li class="w3-bar">
        <a href="delete.php?id=<?php echo $res['id'];?>" style="text-decoration:none;"><span class="w3-bar-item w3-button w3-white w3-xlarge w3-right">×</span></a>
        <a href="credit.php?id=<?php echo $res['id'];?>" style="text-decoration:none;">
        <?php if($res['gender']=='m') {
            echo '<img src="img_avatar2.png" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">';
        }
        else {
            echo '<img src="img_avatar4.png" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">';
        }
        ?>
        <div class="w3-bar-item w3-leftbar">
        <span class="w3-large"><?php echo $res['name']; ?></span><br>
        <span><?php echo $res['email']; ?></span><br>
        <span><?php echo $res['phno']; ?></span>
        </div>
        <br/>
        <span class="w3-bar-item w3-xlarge w3-right"style="margin-right:10%"><?php echo $res['credit_status']; ?></span>
        </a>
        </li>
    <?php 
        }
    ?>
    </ul>
    <br/><br/>
    <a href="insert.php" style="text-decoration:none;">
    <button class="w3-button w3-circle w3-pink w3-xlarge w3-ripple" style="margin-left:80%">+</button>
    </a>
    <br/><br/>
         
    </div>
  </div>
</div>

</body>
</html>