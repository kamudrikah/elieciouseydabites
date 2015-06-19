<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script language="JavaScript">

function myFunction() {
			document.getElementById("form_name").reset();
		}

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
			document.getElementById("form_name").reset();
		}
		
	function numericFilter(txb) {
   		txb.value = txb.value.replace(/[^\0-9]/ig, "");
		}
	//-->

	// check box all in product

	$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
	    });
	    
	});

	function checkEmail() {

    var email = document.getElementById('Cemail');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    email.value = null;
    return false;
	 }
	}
	</script>	