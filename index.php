<!DOCTYPE html>
<html>
<head>
<title>Weather API</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://bootswatch.com/4/cyborg/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.3.1.js"></script>
<script src="script.js"></script>
</head>

<body>

<div class="container text-center">
 <h1>Weather API</h1>

 <h2>-----</h2>

 <div class="row">
   <div class="well col-md-12 col-md-offset-3" id="inf">
    <div id="wInfo"></div>
    <button class="btn btn-info" id="temp"></button>
    <div class="icon"></div>
   </div>
 </div>
</div>

<div class="container text-center">
<div class="row">
  <div class="well col-md-12 col-lg-12 col-md-offset-3" id="inf2">
    <form class="form-inline center" action="index.php" id='forma' role="form" method="get">
      <div class="form-group">
        <input type="text" id="cityName" placeholder="Enter your city" name="city" ></input>
        <input type="submit" class="btn btn-default"></input>
      </div>
    </form>
<script type="text/javascript">
    $(document).ready(function(){
      showWeather2();

      //get User location
      function showWeather2(){
       var ipApi="http://ip-api.com/json";

       //get location using ip-API
       $.getJSON(ipApi,function(json){

      //var cityname=$("#cityName").get(0);
      /*var c=document.getElementById('forma');
      cityname=c.elements[0].val;

      $("#cityName").keyup(function(){
          alert($(this).val());
          var citynam=$("#cityName").val();
          console.log(citynam);
      });*/
      //getting weather data using weather-API
      //var weatherApi='http://api.openweathermap.org/data/2.5/weather?lat='+lat+'&lon='+long+'&appid=b8810bfc4f07f9e79bd4d72d2b65c9fa';
      //citynam=$("#cityName").val();
      var cityname={};
      cityname=document.querySelector('input').value;

      $("#cityName").keyup(function(){
         //alert($(this).val());
          var citynam=$(this).val();
      });
      //console.log(globalVar);
      //alert(window.value);
      var spge='<?php echo $_GET['city'] ;?>';
      var weatherApi2='http://api.openweathermap.org/data/2.5/weather?q='+spge+'&appid=b8810bfc4f07f9e79bd4d72d2b65c9fa';
      console.log(weatherApi2);
      $.getJSON(weatherApi2,function(json){
        console.log(json);

        var ktemp2=json.main.temp;
        var ctemp2=Math.round((ktemp2-273)); //2 numbers after the camma
        var mainWea2=json.weather[0].main;

        //converting json to html
        var html2="";
        html2+="<p><span>"+json.name+"</span>"+json.sys.country+"</p>";
        html2+="<p>"+mainWea2+"</p>";
        $("#wInfo2").html(html2);
        var tempid2=$("#temp2");
        tempid2.html(ctemp2+"&degC");

         //change background
         if(ctemp2>25){
           $('body').css({
             'background':'url("http://www.pocketables.com/images/2012/07/sunny-608x333.jpg")',
             'background-size':'cover'
           });
         }else if(ctemp2<25){
           $('body').css({
             'background':'url("https://preview.ibb.co/jkSG5T/lightning.jpg")',
             'background-size':'cover'
           });

         }

          //change icon depending on the weather
          var icon2Div=$(".icon2");
          switch(mainWea2){
              case 'Rain': icon2Div.toggleClass('rain');
                           break;
              case 'Clouds': icon2Div.toggleClass('cloud');
                           break;
              case 'Clear': icon2Div.toggleClass('clear');
                           break;
              case 'Drizzle': icon2Div.toggleClass('clear');
                            break;
              default: icon2Div.toggleClass('clear');
          }

  2    });
      });

      }

    });
</script>
   <div id="wInfo2"></div>
   <button class="btn btn-info" id="temp2"></button>
   <div class="icon2"></div>
  </div>
</div>
</div>
</div>

</body>
