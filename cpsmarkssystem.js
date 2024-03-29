//@ts-nocheck


//The function creates tabs

function openTab(evt, tabName) {
    //Declare all varibales;
    var i, tabcontent, tabLinks;

    //Access all elements with className tabcontents and store in tabcontent;
    //Loop through all the available elements and hide them;

    tabcontent = document.getElementsByClassName("tabcontents");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        
    }

    //Get all elements with className tabLink, and store them in tabLinks;
    //Loop through each, target the className and replace it with className "active";

    tabLinks = document.getElementsByClassName("tabLink");
    for(i = 0; i < tabLinks.length; i++) {
        tabLinks[i].className = tabLinks[i].className.replace("active", "");
                
    }

        //Get an element, by its tabName, and display it if className is "active";
        document.getElementById(tabName).style.display = "grid";
        evt.currentTarget.className += "active";
        
}


//load the element with the id="defaultOpen" and click on it
var open = document.getElementById("defaultOpen").click();


/* SCRIPT FROM SCHOOL SYSTEM ===============================================*/

// open buttons
let main = document.getElementById("app");

let regbox = document.getElementById("studentRegbox");

let entermarks = document.getElementById('bodyRoot');
let gradebox = document.getElementById("studentGradebox");
let dataT = document.getElementById("dataTable");

let openRegistry = () => {
    gradebox.style.display = "none";
    staffbox.style.display = "none";
    entermarks.style.display = 'none';
    regbox.style.display = "block";
    document.querySelector(".regtitle").innerHTML = "Register";
    //document.querySelector(".rgshow").innerHTML = "";
    rgtxt.style.display = 'none';
    document.querySelector(".performance").innerHTML = "Register Student";
    document.getElementById("performanceOpener").click();

} 



let staffbox = document.getElementById("staffRegbox");

            let staffRegbtn = document.getElementById("ortRegister");


staffRegbtn.addEventListener('click', function() {
    gradebox.style.display = "none";
    entermarks.style.display = 'none';
    regbox.style.display = "none";
    staffbox.style.display = "block";
    document.querySelector(".regtitle").innerHTML = "Register";
    //document.querySelector(".rgshow").innerHTML = "";
    rgtxt.style.display = 'none';
    document.querySelector(".perfCentral").style.overflow = "scroll";
    document.querySelector(".performance").innerHTML = "Register Staff";
    document.getElementById("performanceOpener").click();
});



let closeRegistry = () => {
    //regNotif.innerHTML = "Hi";

        //open confirm box
        document.querySelector("html").style.opacity = "1";
        let regTab = document.querySelector(".p-central-box");
        //regTab.style.display = "block";
        let rconfirm = document.querySelector(".regConfirm");
        rconfirm.classList.add("dialogStyles");
        rconfirm.style.display = "block";

        /*
        rconfirm.style.position = "absolute";
        rconfirm.style.top = "30%";
        rconfirm.style.left = "35%";
        rconfirm.style.zIndex = "10";
        */
}

function closeGradebox() {
    closeRegistry();

}

function closeMarksbox() {
    closeRegistry();
}

function closetRegistry() {
    closeRegistry();
}

let openMarksbox = () => {
    regbox.style.display = "none";
    gradebox.style.display = "block";
    entermarks.style.display = 'none';
    document.querySelector(".regtitle").innerHTML = "Grade";
    rgtxt.style.display = "none";
    document.querySelector(".performance").innerHTML = "Grade Student";
    document.getElementById("performanceOpener").click();

}

let enterMarksbox = () => {
    regbox.style.display = "none";
    gradebox.style.display = "none";
    entermarks.style.display = 'block';
    document.querySelector(".regtitle").innerHTML = "Marks";
    rgtxt.style.display = "none";
    document.querySelector(".performance").innerHTML = "Enter Marks";
    document.getElementById("performanceOpener").click();

}

/*let closeGradebox = () => {


    gradebox.style.display = "block"; //do not close
}*/


//purpose to hide the records box, if no record has been added;

let openStudentRecords = () => {
    document.getElementById("graphicsOpener").click();

    //dataT.style.display = "block";
}

let closeDatabox = () => {
    //dataT.style.display = "block"; //do not close
    document.getElementById("defaultOpen").click();

}

function trygoingHome() {
    document.getElementById("defaultOpen").click();
}


//Register student and add to records

//get inputs from register

let regNotif = document.getElementById("regNotif"); //reg output

let stdname = document.getElementById("studentNameinput");

let stdReg = document.getElementById("studentRegNo");

let stdstream = document.getElementById("studentStream");

let emarks = document.getElementById("entryMarks");

let hlthstatus = document.getElementById("healthStatus");

let stdgender = document.getElementById("studentGender");

let stdage = document.getElementById("studentAge");


//For image
let profile = document.querySelector("img.stdImg");






//SAVE GRADES
let grdNotif = document.getElementById("grdNotif"); //grd output


let savecpsGrades = () => {
    grdNotif.innerHTML = "Grades Successfully Saved!";
    grdNotif.style.color = "black";
}

//DELETE GRADES 

let delcpsGrades = () => {

    //This only clears the inputs

    grdNotif.innerHTML = "Grades deleted Successfully!";
    grdNotif.style.color = "black";
}

let delRegStd = () => {
    //This just clears the inputs and not the data stored


    stdname.value = "";
    stdReg.value = "";
    stdstream.value = "";
    emarks.value = "";
    hlthstatus.value = "";
    stdgender.value = "";
    stdage.value = "";
    regNotif.innerHTML = "Student Successfully deleted";

    //delete from records
    stdoneNum.innerHTML = "";
    stdoneName.innerHTML = stdname.value;
    stdoneReg.innerHTML = stdReg.value;
    stdoneStream.innerHTML = stdstream.value;
    stdoneeMarks.innerHTML = emarks.value;
    //current marks will be added from the grading box
    stdonecMarks.innerHTML = "";
    stdonehstatus.innerHTML = hlthstatus.value;
    stdonegender.innerHTML = stdgender.value;
    stdoneage.innerHTML = stdage.value;
}


//change avatar

let avatars = ["./images/students1.jpg", "./images/students2.jpg", "./images/students3.jpg", "./images/students4.jpg", "./images/students5.jpg"];
function changeProfile() {
    for(let p = 0; p < avatars.length;p++) {
        let myp = document.querySelector(".stdImg");
        myp.setAttribute("src", avatars[p]); //shows 1st and last image;
    }
}


//Confirm box script
//this element has been called before but as a local variable
//recreate it as a global variable
let rconfirm = document.querySelector(".regConfirm");

//when close button is clicked;
let closeconfirmRecords = () => {
    rconfirm.style.display = "none";        
}

//when "No" option is selected;
let confirmRNo = () => {
    rconfirm.style.display = "none";
}

//when "Yes" option is selected

let confirmyes = document.querySelector(".confirmYes");
let rgtxt = document.querySelector(".rgshow");
let confirmRYes = () => {
    regbox.style.display = "none";
    gradebox.style.display = "none";
    entermarks.style.display = "none";
    rconfirm.style.display = "none";
    rgtxt.style.display = "block";
    document.querySelector(".performance").innerHTML = "Registry";

    document.getElementById("defaultOpen").click();
}


//ENTER MARKS JS

//get all inputs
let mathmark = document.getElementById("math");
let engmark = document.getElementById("eng");
let kiswmark = document.getElementById("kisw");
let sciemark = document.getElementById("scie");
let inshamark = document.getElementById("insha");
let compmark = document.getElementById("comp");

let allSubjects = [mathmark, engmark, kiswmark, sciemark, inshamark, compmark];

//get output buttons
let outbtn1 = document.getElementById("subject_output_btn1");
let outbtn2 = document.getElementById("subject_output_btn2");


//get output boxes
let totalmarks = document.getElementById("total_marks");
let total_subjs = document.getElementById("total_subjs");

let lowerout = document.querySelector('.lower_output');

//calculate total


outbtn1.addEventListener('click', function givetotalMarks() {
    if(mathmark !== null && engmark !== null && sciemark !== null && kiswmark !== null & inshamark !== null && compmark !== null) {
        //change typeof input from string to number -integer
        let overallMarks = parseInt(mathmark.value) + parseInt(engmark.value) + parseInt(kiswmark.value) + parseInt(sciemark.value) + parseInt(inshamark.value) + parseInt(compmark.value);
        return totalmarks.innerHTML = overallMarks + " Marks.";
    }else {
        let lowerouter = lowerout.innerHTML = '*Insert all marks';
        
        lowerouter.style.color = "#f00";
    }     

});


outbtn2.addEventListener('click', function showsubjectsNum() {
  let outerme = allSubjects.length;  
  total_subjs.innerHTML = outerme + " Subjects.";
});



//START UPLOAD BOX JS


function uploadMarksbox() {
//when upload btn is clicked, hide the main app section, and show the various upload options
let uploadRoot = document.getElementById('uploadRoot');

let appRoot = document.getElementById("app");

let centralbox = document.getElementById('centralcpsBox');

centralbox.style.overflow = "scroll";
uploadRoot.style.display = "block";
appRoot.style.display = "none";

}


function closeupLoad() {
    //when close upload btn is clicked, hide the upload section, and show main app
let uploadRoot = document.getElementById('uploadRoot');

let appRoot = document.getElementById("app");
uploadRoot.style.display = "none";
appRoot.style.display = "grid";
}


function displayFileName(uploadId) {
    const input = document.getElementById(uploadId);
    //const numericPart = uploadId.match(/\d+/)[0]; // Extract numeric part using regex
    const numericPart = uploadId.replace(/^\D+/g, ''); // Extract numeric part using regex
    //const fileNameDisplay = document.getElementById(`upNotif${uploadId.slice(-1)}`); // Extract the numeric part from the ID
    const fileNameDisplay = document.getElementById(`upNotif${numericPart}`); // Extract the numeric part from the ID

    
    if (input.files.length > 0) {
      fileNameDisplay.textContent = `Selected file for: `+ uploadId + ": " + input.files[0].name ;
    } else {
      fileNameDisplay.textContent = 'No file selected';
    }
  }
  

  function clearAllFiles() {
    const fileInputs = document.querySelectorAll('.upload_input');
    const fileDisplayAreas = document.querySelectorAll('[id^="upNotif"]');
    
    fileInputs.forEach(input => {
      input.value = ''; // Reset the value of each file input
    });
  
    fileDisplayAreas.forEach(displayArea => {
      displayArea.textContent = 'No file selected'; // Update each display area to show no file selected
    });
  }



  //RECORDS CONTENT TABS

let openRecord = (event, rec) => {
    let b, e, recbtns, rectabs;

    //get all tab contents, loop through and hide them
    rectabs = document.getElementsByClassName("recordtabs");
    for(b=0;b<rectabs.length;b++) {
        rectabs[b].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    recbtns = document.getElementsByClassName("recbtn");
    for(e=0;e<recbtns.length;e++) {
        recbtns[e].className = recbtns[e].className.replace("active", " ");
    
    }


    //get tab content by id and display each when active class is targetted;
    
    document.getElementById(rec).style.display = "block";

    event.currentTarget.classList.add("active");
  
    
}


document.getElementById("stdRecords").click();


