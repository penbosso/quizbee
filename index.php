<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>


    </div>
    <style media="screen">
    /*  .topnav{
        background-color: #333;
        overflow: hidden;
        margin :0px
        width :100%

      }
      .topnav a{
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        font-size: 17px;
      }

.topnav a:hover{
  background-color: #ddd;
  color: black;
}

      .topnav a.active{
        background-color: #4caf50;
        color: white;
      }*/
      body{
        height: 100%
        margin:0;

          background-image: url("img/home.jpg");
          height: 100%
          background-position:center;
          background-repeat: no-repeat;
          background-size: cover;
      }
      ul.topnav{
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
      }
      ul.topnav li{
        float: left;
      }
      ul.topnav li a{
        display: block;
        color: white;
        text-align: center;
        padding:14px 16px;
        text-decoration: none;
      }
      ul.topnav li a:hover:not(.active){
        background-color: #111;
      }
      ul.topnav li a.active{
        background-color: #4caf50;

      }
ul.topnav li.right{
  float: right;
}  position: fixed;

@@media screen and (max-width:600px){
  ul.topnav li.right,
  ul.topnav li {float:none}

}
#p1{
text-align: center;
font-style: italic;
font-size: 70px;
}

p{
  font-family: sans-serif;
  color: white;
  font-size: 40px;
  font-style: italic;
}
img{
  border-radius: 50%;
  width: 70px;
  height: auto;
}
.button{
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #ffffff;
  text-align: center;
  font-size: 18px;
  padding: 20px;
  width: 200px;
  transition:all 0.5s;
  cursor: pointer;
  margin: 5px;
  font-family: sans-serif;
}
.button span{
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.button:hover span{
  padding-right: 25px;

}
.button span:after{
  content:'\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;

}
.button:hover.active span::after{
  opacity: 1;
  right: 0;

}
#quote{
  text-align: center;
  font-size: 19px;
  font-style: italic;
  font-family:monospace ;
}
footer{
  opacity:0.8;
  font-family: sans-serif;
  font-style: italic;
  text-align: center;
}
    </style>

      <link rel="stylesheet" type="text/css" href="css/page.css">

</head>

<body>
<div class="header">
   <ul>
   <li><a href="index.php"> Home </a></i></li>
       <li><a href="page/index.php"> Message</a></i></li>
       
        </div>
       
       
       <li id="logout"><a href="include/logout.php" >Logout</a></li>
   </ul>
</div>
<h1><p class="p">Hey There!!</p>
<p id="p1">IMPULSE </p>
<p class="p"></p>
</h1>
<p style="padding-left:75px;">Learning is Fun</p>
<p><a href="page/login.php"><button type="button" name="button" class="button"><span>Let's Get Started</span></button>
</a>
</p>
<p id="quote">"The capacity to learn is a <strong>gift</strong>;the ability learn is a <strong>skill</strong>;the willingness to learn is a <strong>choice</strong>. "</p>

<footer>

<strong>&copy;<script type="text/javascript">
  var d = new Date()
  document.write(d.getFullYear())
</script>
Quizbee</strong>
</footer>

  </body>
</html>
