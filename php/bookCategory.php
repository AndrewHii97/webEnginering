<?php
session_start();
?>

<html>

<head>
  <meta charset="utf-8" />
  <title>BRSP</title>
</head>

<body>
  This is bookCategory of BRSP.
  <br>
  Navigation bar: <br>
  <a href="bookCategory.php">Book category</a>
  <br><a href="../html/cart2.html">cart</a><br>
  <a href="../html/login.html">login</a><br>
  Hi <?php echo $_SESSION['username']?>!<br>
  <a href="profile.php">profile</a><br>
  BOOK CATEGORY<br>
  <span id="all" onclick="sendCategory('')">all</span>
  <span id="Adventure" onclick="sendCategory('Adventure')">Adventure</span>
  <span id="Fable" onclick="sendCategory('Fable')">Fable</span>
  <span id="Horror" onclick="sendCategory('Horror')">Horror</span>
  <span id="Music" onclick="sendCategory('Music')">Music</span>
  <span id="Parenting" onclick="sendCategory('Parenting')">Parenting</span>
  <span id="Romance" onclick="sendCategory('Romance')">Romance</span>
  <span id="Sci-Fi" onclick="sendCategory('Sci-Fi')">Sci-Fi</span>
  <span id="Self-Help" onclick="sendCategory('Self-Help')">Self-Help</span>
  <span id="Suspense" onclick="sendCategory('Suspense')">Suspense</span>

  <?php
    for($i=0; $i<10; $i++){
        echo '
        <div id="book.">
            <img id="img." src="" onclick="sendForm(.)">
            <p id="bookname."></p>
            <span id="price."></span>
        </div>;
        '
    }
  ?>




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
    <form id="myForm" action="bookDetail.php" method="GET">
      <input hidden id="data" type="text" name="x" value="">
      <br><br>
      <input hidden type="submit" value="Submit">
    </form>
  </div>

  <script>
    // var obj
    var xmlhttp, myObj, x, txt = "", dbParam;
    function sendForm(booknum) {
      document.getElementById("data").value = myObj[booknum - 1].bookid;
      document.getElementById("myForm").submit();
    }

    function sendCategory(cat) {
        var data = '?x=' + cat;
        callAjax(data);
    }

    // dbParam = JSON.stringify(obj);
    function callAjax(dbparam){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        // console.log(myObj);
    var test = 'img1';
        //book1
        document.getElementById("bookname1").innerHTML = myObj[0].bookname;
        document.getElementById("price1").innerHTML = "Price: RM" + myObj[0].price;
        document.getElementById(test).src = "../" + myObj[0].url;

        //book2
        document.getElementById("bookname2").innerHTML = myObj[1].bookname;
        document.getElementById("price2").innerHTML = "Price: RM" + myObj[1].price;
        document.getElementById("img2").src = "../" + myObj[1].url;

        //book3
        document.getElementById("bookname3").innerHTML = myObj[2].bookname;
        document.getElementById("price3").innerHTML = "Price: RM" + myObj[2].price;
        document.getElementById("img3").src = "../" + myObj[2].url;

        //book4 
        document.getElementById("bookname4").innerHTML = myObj[3].bookname;
        document.getElementById("price4").innerHTML = "Price: RM" + myObj[3].price;
        document.getElementById("img4").src = "../" + myObj[3].url;

      }
    };
    xmlhttp.open("GET", "bookCategory_background.php"+dbparam, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
    // xmlhttp.send("x=" + dbParam);
    }
    callAjax('');
  </script>



</body>

</html>