
function showDate()
{
	var d = new Date();
	months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
	days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
	return days[d.getDay()]+' '+months[d.getMonth()]+' '+d.getDate()+' '+d.getFullYear();
}

document.getElementById("bar_time").innerHTML = showDate();