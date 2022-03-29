
var d = new Date();

var day=new Array("Воскресенье","Понедельник","Вторник",
"Среда","Четверг","Пятница","Суббота");

var month=new Array("января","февраля","марта","апреля","мая","июня",
"июля","августа","сентября","октября","ноября","декабря");

document.write(day[d.getDay()]+" " +d.getDate()+ " " + month[d.getMonth()]
+ " " + d.getFullYear() + " г.");
function clock(){
  var date = new Date(),
         hours = (date.getHours() < 10) ? '0' + date.getHours() : date.getHours(),
         minutes = (date.getMinutes() < 10) ? '0' + date.getMinutes() : date.getMinutes(),
         seconds = (date.getSeconds() < 10) ? '0' + date.getSeconds() : date.getSeconds();
  document.getElementById('clock').innerHTML = hours + ':' + minutes + ':' + seconds;
}
setInterval(clock, 1000);
clock();