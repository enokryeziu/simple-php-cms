function validateForm() {
    var fname = document.forms["cForm"]["name"].value;
    var femail = document.forms["cForm"]["email"].value;	
    var freason = document.forms["cForm"]["reason"].value;
    var fmessage = document.forms["cForm"]["message"].value;
    var fgender = document.forms["cForm"]["gender"].value;

    var nameReg = /^[a-zA-Z ]*$/;
    var emailReg = /^(([^<>()	\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var check = true;
	if (fname == "" || nameReg.test(fname) == false) {
    	var fn = document.forms["cForm"]["name"];
    	fn.classList.add('valideInput');
    	check = false;
    }else {
    	var fn = document.forms["cForm"]["name"];
    	fn.classList.remove('valideInput');
    }
    if (femail == "" || emailReg.test(femail) == false) {
        var fe = document.forms["cForm"]["email"];
        fe.classList.add('valideInput');
        check = false;
    }else {
    	var fn = document.forms["cForm"]["email"];
    	fn.classList.remove('valideInput');
    }
    if (freason == "") {
        var fm = document.forms["cForm"]["reason"];
        fm.classList.add('valideInput');
        check = false;
    }else {
    	var fn = document.forms["cForm"]["reason"];
    	fn.classList.remove('valideInput');
    }
    if (fmessage == "") {
        var fm = document.forms["cForm"]["message"];
        fm.classList.add('valideInput');
        check = false;
    }else {
    	var fn = document.forms["cForm"]["message"];
    	fn.classList.remove('valideInput');
    }
    if (fgender == "") {
        var fm = document.getElementById("genderDiv");
        fm.classList.add('error');
        check = false;
    }else {
        var fn = document.getElementById("genderDiv");
        fn.classList.remove('error');
    }
    return check;
}
function slideShow(n){
	var s = document.getElementsByClassName('slide');
	document.getElementById("slideActive").removeAttribute("id");
	s[n].setAttribute("id", "slideActive");


	var b = document.querySelectorAll('#slideButton > button');
	document.getElementById("activeB").removeAttribute("id");
	b[n].setAttribute("id", "activeB");
}
function autoSlideShow(){
	var i = 0;
	window.onload = setInterval(function(){
		if(i != 3){
			slideShow(i++);
		}else{
			i = 0;
			slideShow(i++);
		}
	}, 8000);

}	

function validateRegister() {
    var fname = document.forms["cForm"]["name"].value;
    var femail = document.forms["cForm"]["email"].value;    
    var fpassword = document.forms["cForm"]["password"].value;
    var fconfpassword = document.forms["cForm"]["confPassword"].value;

    var nameReg = /^[a-zA-Z ]*$/;
    var emailReg = /^(([^<>()   \[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var check = true;
    if (fname == "" || nameReg.test(fname) == false) {
        document.getElementById("errName").innerHTML = "Your name should only contain letters and white spaces.";
        check = false;
    }else {
        document.getElementById("errName").innerHTML = "";
    }
    if (femail == "" || emailReg.test(femail) == false) {
        document.getElementById("errEmail").innerHTML = "Invalid email format.";
        check = false;
    }else {
        document.getElementById("errEmail").innerHTML = "";
    }
    if (fpassword == "" || fpassword.length < 8) {
        document.getElementById("errPassword").innerHTML = "Passwords must be at least 8 characters long.";
        check = false;
    }else {
        document.getElementById("errPassword").innerHTML = "";
    }
    if (fconfpassword == "" || fconfpassword.length < 8) {
        document.getElementById("errConfPassword").innerHTML = "Password confirmation doesn't match the password.";
        check = false;
    }else {
        document.getElementById("errConfPassword").innerHTML = "";
    }
    return check;
}
function validateAbout() {
    var ftitle = document.forms["aboutForm"]["title"].value;
    var finfo = document.forms["aboutForm"]["info"].value;    
    var fusername = document.forms["aboutForm"]["twitter"].value;

    var twitterReg = /^[a-zA-Z0-9_]{1,15}$/;
    var check = true;
    if (ftitle == "") {
        document.getElementById("errTitle").innerHTML = "Title should not be empty.";
        check = false;
    }else {
        document.getElementById("errTitle").innerHTML = "";
    }
    if (finfo == "") {
        document.getElementById("errInfo").innerHTML = "Info should not be empty.";
        check = false;
    }else {
        document.getElementById("errInfo").innerHTML = "";
    }
    if (fusername == "" || twitterReg.test(fusername) == false) {
        document.getElementById("errTwitter").innerHTML = "Invalid twitter username format";
        check = false;
    }else {
        document.getElementById("errTwitter").innerHTML = "";
    }
    return check;
}
function validateAddServices() {
    var ftitle = document.forms["servicesForm"]["title"].value;
    var fdescription = document.forms["servicesForm"]["description"].value;    
    var fileToUpload = document.forms["servicesForm"]["fileToUpload"].value;
    var fcreated_date = document.forms["servicesForm"]["created_date"].value;

    var check = true;
    if (ftitle == "") {
        document.getElementById("titlespan").innerHTML = "Title is required!";
        check = false;  
    }else {
        document.getElementById("titlespan").innerHTML = "";
    }
    if (fdescription == "") {
        document.getElementById("descspan").innerHTML = "Description is required!";
        check = false;
    }else {
        document.getElementById("descspan").innerHTML = "";
    }
    if (fileToUpload == "") {
        document.getElementById("photospan").innerHTML = "Picture is required!";
        check = false;
    }else {
        document.getElementById("photospan").innerHTML = "";
    }
    if (fcreated_date == "") {
        document.getElementById("datespan").innerHTML = "Date is required!";
        check = false;
    }else {
        document.getElementById("datespan").innerHTML = "";
    }
    return check;
}
function validateEditServices() {
    var ftitle = document.forms["servicesForm"]["title"].value;
    var fdescription = document.forms["servicesForm"]["description"].value;
    var fcreated_date = document.forms["servicesForm"]["date"].value;

    var check = true;
    if (ftitle == "") {
        document.getElementById("titlespan").innerHTML = "Title is required!";
        check = false; 
    }else {
        document.getElementById("titlespan").innerHTML = "";
    }
    if (fdescription == "") {
        document.getElementById("descspan").innerHTML = "Description is required!";
        check = false;
    }else {
        document.getElementById("descspan").innerHTML = "";
    }
    if (fcreated_date == "") {
        document.getElementById("datespan").innerHTML = "Date is required!";
        check = false;
    }else {
        document.getElementById("datespan").innerHTML = "";
    }
    return check;
}
function validateTestimonial() {
    var fname = document.forms["testimonial"]["name"].value;
    var ftext = document.forms["testimonial"]["text"].value;
    var ftitle = document.forms["testimonial"]["title"].value;
    var fcompany = document.forms["testimonial"]["company"].value;
    
    var check = true;
    if (fname == "") {
        document.getElementById("namespan").innerHTML = "Title is required!";
        check = false; 
    }else {
        document.getElementById("namespan").innerHTML = "";
    }
    if (ftext == "") {
        document.getElementById("textspan").innerHTML = "Text is required!";
        check = false;
    }else {
        document.getElementById("textspan").innerHTML = "";
    }
    if (ftitle == "") {
        document.getElementById("titlespan").innerHTML = "Title is required!";
        check = false;
    }else {
        document.getElementById("titlespan").innerHTML = "";
    }
    if (fcompany == "") {
        document.getElementById("companyspan").innerHTML = "Company is required!";
        check = false;
    }else {
        document.getElementById("companyspan").innerHTML = "";
    }
    return check;
}
