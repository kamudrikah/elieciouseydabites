<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script language="JavaScript">

	<!-- Waktu Dan Tarikh
	<!--
	function clock(){
			var time = new Date()
			var hr = time.getHours()
			var min = time.getMinutes()
			var sec = time.getSeconds()
			var ampm = " PM "
		
		if (hr < 12){
			ampm = " AM "
		}
		if (hr > 12){
			hr -= 12
		}
		if (hr < 10){
			hr = " " + hr
		}
		if (min < 10){
			min = "0" + min
		}
		if (sec < 10){
			sec = "0" + sec
		}
			document.getElementById('clock').innerHTML = hr + ":" + min + ":" + sec + ampm
			setTimeout("clock()", 1000)
	}
		
	function date(){
		var date = new Date()
		var year = date.getYear()
			if(year < 1000){
				year += 1900
			}
		var monthArray = new Array("Januari", "Februari", "Mac", "April", "Mei", "Jun", 
		"Julai", "Ogos", "September", "Oktober", "November", "Disember")
		document.getElementById('date').innerHTML = monthArray[date.getMonth()] + " " + date.getDate() + ", " + year
		}
		
	function myFunction() {
			document.getElementById("insert").reset();
		}
		
	function numericFilter(txb) {
   		txb.value = txb.value.replace(/[^\0-9]/ig, "");
		}
	//-->
	</script>	