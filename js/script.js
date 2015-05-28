function studentPersonal(){
	
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/Personal.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'GET',
	    data: {StudentID: studentID},
	    success: function (data) {
			if(data != "0 results"){
				jQuery('#dynamicDiv')[0].innerHTML = data;
			}
			else{
				jQuery('#dynamicDiv')[0].innerHTML = "";
			}
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
}

function studentProfessional(){
	
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/Professional.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'GET',
		data: {StudentID: studentID},
	    success: function (data) {
			if(data != "0 results"){
				jQuery('#dynamicDiv')[0].innerHTML = data;
			}
			else{
				jQuery('#dynamicDiv')[0].innerHTML = "";
			}
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
}
function filterSupervisor(){
	var searchText = jQuery('#txtSearch').val();
	var searchCriteria = jQuery('#ddlSearch').val();
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/FilterSupervisor.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'GET',
	    data: {Text: searchText, Criteria: searchCriteria},
	    success: function (data) {
			if(data != "0 results"){
				jQuery('#dynamicDiv')[0].innerHTML = data;
			}
			else{
				jQuery('#dynamicDiv')[0].innerHTML = "";
			}
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
}

function displayPopupToSave(){
	$( "#popupElement" ).dialog({
		autoOpen: false,
		maxWidth:600,
        maxHeight: 500,
        width: 600,
        height: 500,
        modal: true,
		buttons: [
		{
			text: "Save",
			click: function() {
				SaveDetails();
			}
		},
		{
			text: "Cancel",
			click: function() {
				jQuery( this ).dialog( "close" );
			}
		}
		]
	});
}

function addSupervisor(){
	var searchText = jQuery('#txtSearch').val();
	var searchCriteria = jQuery('#ddlSearch').val();
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/AddSupervisor.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'GET',
	    data: {Text: searchText, Criteria: searchCriteria},
	    success: function (data) {
			if(data != "0 results"){
				jQuery('#dynamicDiv')[0].innerHTML = data;
			}
			else{
				jQuery('#dynamicDiv')[0].innerHTML = "";
			}
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
}



function SaveDetails()
{
	var supid = jQuery('#supid')[0].innerText;
	var fname = jQuery('#fname')[0].innerText;
	var lname = jQuery('#lname')[0].innerText;
	var email = jQuery('#email')[0].innerText;
	var phone = jQuery('#phone')[0].innerText;
	var street = jQuery('#street')[0].innerText;
	var city = jQuery('#city')[0].innerText;
	var zip = jQuery('#zip')[0].innerText;	
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/SupervisorUpdate.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'GET',
		data: {supid: supid, fname:fname, lname: lname, email:email, phone:phone, street:street, city:city, zip:zip},
	    success: function (data) {
			jQuery( "#popupElement" ).dialog( "close" );
			alert("Details are updated successfully");
			window.location = window.location.origin + "/" + window.location.pathname.split("/")[1]+"/adminSupervisor.php";
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
}
function displayDetailstoedit(supervisorID){
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/DisplayDetailsToEdit.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'GET',
	    data: {supervisorID: supervisorID},
	    success: function (data) {
			if(data != "0 results"){
				jQuery('#popupElement')[0].innerHTML = data;
			}
			else{
				jQuery('#popupElement')[0].innerHTML = "";
			}
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
	
	jQuery( "#popupElement" ).dialog( "open" );
	event.preventDefault();
}
/*function filterInternship(){		
	var searchText = jQuery('#txtSearch').val();
	var searchCriteria = jQuery('#ddlSearch').val();
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/FilterInternship.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'GET',
	    data: {Text: searchText, Criteria: searchCriteria},
	    success: function (data) {
			if(data != "0 results"){
				jQuery('#dynamicDiv')[0].innerHTML = data;
			}
			else{
				jQuery('#dynamicDiv')[0].innerHTML = "";
			}
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
}*/

function filterStudent(){	
	
	var searchText = jQuery('#txtSearch').val();
	var searchCriteria = jQuery('#ddlSearch').val();
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/FilterStudents.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'GET',
	    data: {Text: searchText, Criteria: searchCriteria},
	    success: function (data) {
			if(data != "0 results"){
				jQuery('#dynamicDiv')[0].innerHTML = data;
			}
			else{
				jQuery('#dynamicDiv')[0].innerHTML = "";
			}
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
}

function filterInternship(){
	var searchText = jQuery('#txtSearch').val();
	var searchCriteria = jQuery('#ddlSearch').val();
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/AjaxHandler.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'GET',
	    data: {FieldId: "filterInternship", Text: searchText, Criteria: searchCriteria},
	    success: function (data) {
			if(data != "0 results"){
				jQuery('#dynamicDiv')[0].innerHTML = data;
			}
			else{
				jQuery('#dynamicDiv')[0].innerHTML = "";
			}
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
}

function displayPopup(){
	$( "#popupElement" ).dialog({
		autoOpen: false,
		maxWidth:600,
        maxHeight: 500,
        width: 600,
        height: 500,
        modal: true,
		buttons: [
		{
			text: "Apply",
			click: function() {
				applyInternship();
			}
		},
		{
			text: "Cancel",
			click: function() {
				jQuery( this ).dialog( "close" );
			}
		}
		]
	});
}

function displayDetails(internshipID){
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/AjaxHandler.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'GET',
	    data: {FieldId: "displayDetails", StudentID: studentID, InternshipID: internshipID},
	    success: function (data) {
			if(data != "0 results"){
				jQuery('#popupElement')[0].innerHTML = data;
				var isApplied = jQuery('#isApplied').val();
				if(isApplied == 1){
					jQuery(jQuery('.ui-dialog-buttonset').find(':button')[0]).attr("disabled", "disabled");
				}
				else{
					jQuery(jQuery('.ui-dialog-buttonset').find(':button')[0]).removeAttr("disabled");
				}
			}
			else{
				jQuery('#popupElement')[0].innerHTML = "";
			}
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
	
	jQuery( "#popupElement" ).dialog( "open" );
	event.preventDefault();
}

function applyInternship(){
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/AjaxHandler.php";
	var internshipID = jQuery('#internshipID').val();
	var studentWorkHours = jQuery('#studentWork_Hours').val();
	var workHours = jQuery('#workHour').val();
	if(parseInt(studentWorkHours) + parseInt(workHours) > 20){
		alert("Maximum work hours exceeded!");
	}
	else{
		jQuery.ajax({
			url: navigationURL,
			type: 'GET',
			data: {FieldId: "applyInternship", StudentID: studentID, InternshipID: internshipID},
			success: function (data) {
				if(data == "Inserted Successfully"){
					alert("Applied Successfully");
					jQuery("#popupElement").dialog( "close" );
				}
				else{
					alert("Unable to apply");
				}
			},
			error:function(data, status, er){
				alert("error: "+data+" status: "+status+" er:"+er);
			}
		});
	}
	
	event.preventDefault();
}

function displayApplications(){
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/AjaxHandler.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'GET',
	    data: {FieldId: "displayApplications", StudentID: studentID},
	    success: function (data) {
			if(data != "0 results"){
				jQuery('#dynamicDiv')[0].innerHTML = data;
			}
			else{
				jQuery('#dynamicDiv')[0].innerHTML = "You haven't applied for any internships yet!";
			}
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
	
	event.preventDefault();
}

function withdrawApplication(internshipID){
	var confirmBox = confirm("Are you sure you want to withdraw your application for this internship?");
	if(confirmBox == true){
		var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
		navigationURL = navigationURL+"/AjaxHandler.php";
		jQuery.ajax({
			url: navigationURL,
			type: 'GET',
			data: {FieldId: "withdrawApplication", StudentID: studentID, InternshipID: internshipID},
			success: function (data) {
				if(data == "Withdrew Successfully"){
					alert(data);
					window.location = window.location.origin + "/" + window.location.pathname.split("/")[1]+"/stuapp.php";
				}
				else{
					alert(data);
				}
			},
			error:function(data, status, er){
				alert("error: "+data+" status: "+status+" er:"+er);
			}
		});
	}	
	event.preventDefault();
}
