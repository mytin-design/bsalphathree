//@ts-nocheck


//The function creates tabs

function startg3Tab(evt, tabName) {
    //Declare all varibales;
    var b, tabcontenttt, tabLinksss;

    //Access all elements with className tabcontents and store in tabcontent;
    //Loop through all the available elements and hide them;

    tabcontenttt = document.getElementsByClassName("grd3hub");
    for (b = 0; b < tabcontenttt.length; b++) {
        tabcontenttt[b].style.display = "none";
        
    }

    //Get all elements with className tabLink, and store them in tabLinks;
    //Loop through each, target the className and replace it with className "active";

    tabLinksss = document.getElementsByClassName("grade3abtn");
    for(b = 0; b < tabLinksss.length; b++) {
        tabLinksss[b].className = tabLinksss[b].className.replace("active", "");
                
    }

        //Get an element, by its tabName, and display it if className is "active";
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += "active";
        
}



//load the element with the id="defaultOpen" and click on it
var open = document.getElementById("default1Open").click();





//EXAM TABS


function openexTab(event, ex) {
    //Declare all varibales;
    var t, y,  excont, exbtns;

    //Access all elements with className tabcontents and store in tabcontent;
    //Loop through all the available elements and hide them;

    excont = document.getElementsByClassName("extabcon");
    for (t = 0; t < excont.length; t++) {
        excont[t].style.display = "none";
        
    }

    //Get all elements with className tabLink, and store them in tabLinks;
    //Loop through each, target the className and replace it with className "active";

    exbtns = document.getElementsByClassName("extabbtn");
    for(y = 0; y < exbtns.length; y++) {
        exbtns[y].className = exbtns[y].className.replace("active", " ");
                
    }

        //Get an element, by its tabName, and display it if className is "active";
        document.getElementById(ex).style.display = "block";
        event.currentTarget.className += " active";
        
}



//load the element with the id="exmainexBtn" and click on it
var open = document.getElementById("exmainexBtn").click();
