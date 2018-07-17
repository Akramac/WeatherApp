$(document).ready(function(){
var lat;
var long;

showWeather();

//get User location
function showWeather(){
 var ipApi="http://ip-api.com/json";
 //get location using ip-API
 $.getJSON(ipApi,function(json){
lat =json.lat;
long=json.lon;


//getting weather data using weather-API
var weatherApi='http://api.openweathermap.org/data/2.5/weather?lat='+lat+'&lon='+long+'&appid=b8810bfc4f07f9e79bd4d72d2b65c9fa';
//var weatherApi2='http://api.openweathermap.org/data/2.5/weather?q='+cityname+'&appid=b8810bfc4f07f9e79bd4d72d2b65c9fa';
$.getJSON(weatherApi,function(json){
  console.log(json);

  var ktemp=json.main.temp;
  var ctemp=Math.round((ktemp-273)); //2 numbers after the camma
  var mainWea=json.weather[0].main;

  //converting json to html
  var html="";
  html+="<p><span>"+json.name+"</span>"+json.sys.country+"</p>";
  html+="<p>"+mainWea+"</p>";
  $("#wInfo").html(html);
  var tempid=$("#temp");
  tempid.html(ctemp+"&degC");

   //change background
   if(ctemp>25){
     $('body').css({
       'background':'url("https://thumb.ibb.co/cvzMKJ/sunset_75621_1920.jpg")',
       'background-size':'cover'
     });
   }else if(ctemp<25){
     $('body').css({
       'background':'url("https://preview.ibb.co/jkSG5T/lightning.jpg")',
       'background-size':'cover'
     });

   }
    //change icon depending on the weather
    var iconDiv=$(".icon");
    switch(mainWea){
        case 'Rain': iconDiv.toggleClass('rain');
                     break;
        case 'Clouds': iconDiv.toggleClass('cloud');
                     break;
        case 'Clear': iconDiv.toggleClass('clear');
                     break;
        case 'Drizzle': iconDiv.toggleClass('clear');
                      break;
        default: iconDiv.toggleClass('clear');
    }

});
});

}
// ****************second code for city entered by user*************************
/*showWeather2();

//get User location
function showWeather2(){
 var ipApi="http://ip-api.com/json";

 //get location using ip-API
 $.getJSON(ipApi,function(json){


//var cityname=$("#cityName").get(0);
/*var c=document.getElementById('forma');
cityname=c.elements[0].val;


//getting weather data using weather-API
//var weatherApi='http://api.openweathermap.org/data/2.5/weather?lat='+lat+'&lon='+long+'&appid=b8810bfc4f07f9e79bd4d72d2b65c9fa';
var weatherApi2='http://api.openweathermap.org/data/2.5/weather?q='+cityname+'&appid=b8810bfc4f07f9e79bd4d72d2b65c9fa';
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
  tempid.html(ctemp2+"&degC");

   //change background
   if(ctemp2>25){
     $('body').css({
       'background':'url("https://pixabay.com/fr/arbre-solitaire-sunset-117582/")',
       'background-size':'cover'
     });
   }else if(ctemp2<25){
     $('body').css({
       'background':'url("https://preview.ibb.co/jkSG5T/lightning.jpg")',
       'background-size':'cover'
     });

   }
    //change icon depending on the weather
    var iconDiv2=$(".icon2");
    switch(mainWea2){
        case 'Rain': iconDiv.toggleClass('rain');
                     break;
        case 'Clouds': iconDiv.toggleClass('cloud');
                     break;
        case 'Clear': iconDiv.toggleClass('clear');
                     break;
        case 'Drizzle': iconDiv.toggleClass('clear');
                      break;
        default: iconDiv.toggleClass('clear');
    }

});
});

}*/
});
