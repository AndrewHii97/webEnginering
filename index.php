<?php
session_start();
?>

<html>

<head>
  <meta charset="utf-8" />
  <title>BRSP</title>
</head>

<body>
  This is index.html of BRSP.
  <br>
  Navigation bar: <br>
  <a href="php/bookCategory.php">Book category</a>
  <br><a href="html/cart2.html">cart</a><br>
  <a href="html/login.html">login</a><br>
  Hi <?php echo $_SESSION['username']?>!<br>
  <a href="php/profile.php">profile</a><br>
  NEW ARRIVAL<br>
  <div id="book1">
    <img id="img1" src="" onclick="sendForm(1)">
    <p id="bookname1"></p>
    <span id="price1"></span>
  </div>
  <div id="book2">
    <img id="img2" src="" onclick="sendForm(2)">
    <p id="bookname2"></p>
    <span id="price2"></span>
  </div>
  <div id="book3">
    <img id="img3" src="" onclick="sendForm(3)">
    <p id="bookname3"></p>
    <span id="price3"></span>
  </div>
  <div id="book4">
    <img id="img4" src="" onclick="sendForm(4)">
    <p id="bookname4"></p>
    <span id="price4"></span>
  </div>

  <div>
    <form id="myForm" action="php/bookDetail.php" method="GET">
      <input hidden id="data" type="text" name="x" value="">
      <br><br>
      <input hidden type="submit" value="Submit">
    </form>
  </div>

  <script>
    function sendForm(booknum) {
      document.getElementById("data").value = myObj[booknum - 1].bookid;
      document.getElementById("myForm").submit();
    }
    // var obj
    var xmlhttp, myObj, x, txt = "";

    // dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);

        //book1
        document.getElementById("bookname1").innerHTML = myObj[0].bookname;
        document.getElementById("price1").innerHTML = "Price: RM" + myObj[0].price;
        document.getElementById("img1").src = myObj[0].url;

        //book2
        document.getElementById("bookname2").innerHTML = myObj[1].bookname;
        document.getElementById("price2").innerHTML = "Price: RM" + myObj[1].price;
        document.getElementById("img2").src = myObj[1].url;

        //book3
        document.getElementById("bookname3").innerHTML = myObj[2].bookname;
        document.getElementById("price3").innerHTML = "Price: RM" + myObj[2].price;
        document.getElementById("img3").src = myObj[2].url;

        //book4 
        document.getElementById("bookname4").innerHTML = myObj[3].bookname;
        document.getElementById("price4").innerHTML = "Price: RM" + myObj[3].price;
        document.getElementById("img4").src = myObj[3].url;

      }
    };
    xmlhttp.open("POST", "php/index_background.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
    // xmlhttp.send("x=" + dbParam);
  </script>



</body>

</html>