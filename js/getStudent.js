function deleteStudent(){	
	
	var studentID = jQuery('#studentID').val();
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/deleteStudent.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'POST',
	    data: {StudentID: studentID},
	    success: function (data) {
			//alert(data);
			navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
			navigationURL = navigationURL+"/adminstudent.php";
			window.location.href = navigationURL;
	    },
	    error:function(data, status, er){
	    	//alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
	
	
}


function addSkillRow(){	
	
	$('#studentSkills tr:last').after('<tr><td><input type="hidden" id="skillID"; value=0></input></td><td>Skill Name</td><td><input type="text" style="width:200px;" id="skillName" value=""></input></td><td>Skill Description</td><td><input type="text" style="width:200px;" id="skillDesc" value=""></input></td><td>Years of experience</td><td><input type="text" style="width:200px;" id="experience" value=""></input></td></tr>');
}


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


function updateStudentIntern(internshipID, studentID, isPlaced){
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/updateStudentIntern.php";
	
	var internshipID = internshipID;
	
	//alert(internshipID+' '+studentID+' '+isPlaced);
	//window.location.href = navigationURL;	
	jQuery.ajax({
		url: navigationURL,
		type: 'POST',
	    data: {internshipID: internshipID, studentID: studentID, isPlaced:isPlaced},
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
function displayStudentDetails(studentID){
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/adminstudentEdit.php";
	
	window.location.href = navigationURL;	

	
}


function addStudent(){		

	var studentID = jQuery('#studentID').val();
	var studentFirstName = jQuery('#studentFirstName').val();
	var studentLastName = jQuery('#studentLastName').val();
	var studentPhoneNumber = jQuery('#studentPhoneNumber').val();
	var studentStreet = jQuery('#studentStreet').val();
	var studentCity = jQuery('#studentCity').val();
	var studentZIP = jQuery('#studentZIP').val();
	var studentGPA = jQuery('#studentGPA').val();
	var studentMajor = jQuery('#studentMajor').val();
	var studentResidenceStatus = jQuery('#studentResidenceStatus').val();
	var studentSemester = jQuery('#studentSemester').val();
	var studentDOB = jQuery('#studentDOB').val();
	var studentStartDate = jQuery('#studentStartDate').val();
	var studentGraduationDate = jQuery('#studentGraduationDate').val();
	var studentWorkHours = jQuery('#studentWorkHours').val();
	var userID = jQuery('#userID').val();
	var password = jQuery('#password').val();	
	
	
	//internship table read start
	var refTab = document.getElementById("intern");
	var  ttl;
	var internshipIDs=[];
	var placements=[];
	var intCount=0;
	var placeCount=0;	
	
	// Loop through all rows and columns of the table and popup alert with the value
	// /content of each cell.
	for ( var i = 0; row = refTab.rows[i]; i++ ) {
		row = refTab.rows[i];
		for ( var j = 0; col = row.cells[j]; j++ ) {
			if(col.firstChild.id=='internshipID'){
				internshipIDs[intCount]=col.firstChild.value;
				intCount=intCount+1;
			}	  
			if(col.firstChild.id=='isPlaced'){
				placements[placeCount]=col.firstChild.value;
				placeCount=placeCount+1;
			}
		}
	}
	for(var k=0; k<internshipIDs.length; k++){
		//alert(internshipIDs[k]);
	}
	//internship table read end
	
	//skill table read start
	var refTab = document.getElementById("studentSkills");
	var  ttl;
	var skillIDs=[];
	var skills=[];
	var skillDescs=[];
	var experiences=[];
	var skillCount=0;
	// Loop through all rows and columns of the table and popup alert with the value
	// /content of each cell.
	for ( var i = 2; row = refTab.rows[i]; i++ ) {
		row = refTab.rows[i];
		for ( var j = 0; col = row.cells[j]; j++ ) {
			if(col.firstChild.id=='skillID'){
				skillIDs[skillCount]=col.firstChild.value;

			}
			if(col.firstChild.id=='skillName'){
				skills[skillCount]=col.firstChild.value;

			}
			if(col.firstChild.id=='skillDesc'){
				skillDescs[skillCount]=col.firstChild.value;

			}
			if(col.firstChild.id=='experience'){
				experiences[skillCount]=col.firstChild.value;

			}	  

		}
		
		skillCount=skillCount+1;
	}
	/*for(var k=0; k<skillDescs.length; k++){
		alert(skillIDs[k]);
		alert(skills[k]);
		alert(skillDescs[k]);
		alert(experiences[k]);
	}*/
	//skill table read end

	
	//var searchCriteria = jQuery('#ddlSearch').val();
	var navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
	navigationURL = navigationURL+"/addStudent.php";
	jQuery.ajax({
		url: navigationURL,
		type: 'POST',
	    data: {	studentID: studentID, 
				studentFirstName: studentFirstName,
				studentLastName: studentLastName,
				studentPhoneNumber: studentPhoneNumber,
				studentStreet: studentStreet,
				studentCity: studentCity,
				studentZIP: studentZIP,
				studentGPA: studentGPA,
				studentMajor: studentMajor,
				studentResidenceStatus: studentResidenceStatus,
				studentSemester: studentSemester,
				studentDOB: studentDOB,
				studentStartDate: studentStartDate,
				studentGraduationDate: studentGraduationDate,
				studentWorkHours: studentWorkHours,
				userID:userID,
				password:password,
				internshipIDs:internshipIDs,
				placements:placements,
				skillIDs:skillIDs,
				skills:skills,
				skillDescs:skillDescs,
				experiences:experiences		
				
				},
	    success: function (data) {
			
			navigationURL = window.location.origin + "/" + window.location.pathname.split("/")[1];
			navigationURL = navigationURL+"/adminstudent.php";
			window.location.href = navigationURL;
	    },
	    error:function(data, status, er){
	    	alert("error: "+data+" status: "+status+" er:"+er);
	    }
	});
}
