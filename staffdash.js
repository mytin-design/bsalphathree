let openSec = (evt, sec) => {
    let y, j, padders, holders;

    //get all tab contents, loop through and hide them
    holders = document.getElementsByClassName("holdwrap");
    for(y=0;y<holders.length;y++) {
        holders[y].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    padders = document.getElementsByClassName("padder");
    for(j=0;j<padders.length;j++) {
        padders[j].className = padders[j].className.replace("active", " ");
    }


    //get tab content by id and display each when active class is targetted;

    document.getElementById(sec).style.display = "flex";
    evt.currentTarget.classList.add("active");
    evt.target.style = '#eee';
}


document.getElementById("opendefault").click();



// LEARNER PROGRAMS - WELFARE, CLUBS, GAMES - TAB FUNCTION
//Updated on 23-DEC -2023

let openSection = (evente, section) => {
    let a, s, programItems, sectioncoms;

    //get all tab contents, loop through and hide them
    programItems = document.getElementsByClassName("program-items");
    for(a=0;a<programItems.length;a++) {
        programItems[a].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    sectioncoms = document.getElementsByClassName("sectioncoms");
    for(s=0;s<sectioncoms.length;s++) {
        sectioncoms[s].className = sectioncoms[s].className.replace("active", " ");
    }


    //get tab content by id and display each when active class is targetted;

    document.getElementById(section).style.display = "flex";
    evente.currentTarget.classList.add("active");
}


document.getElementById("openmainSection").click();


 //STUDENTS COMMUNITY - NEWS-STUDENTS DISCORD

let openComms = (event, com) => {
    let n, m, commsbtns, commstabs;

    //get all tab contents, loop through and hide them
    commstabs = document.getElementsByClassName("stuComms");
    for(n=0;n<commstabs.length;n++) {
        commstabs[n].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    commsbtns = document.getElementsByClassName("comms-btn");
    for(m=0;m<commsbtns.length;m++) {
        commsbtns[m].className = commsbtns[m].className.replace("active", " ");
    
    }


    //get tab content by id and display each when active class is targetted;
    if(com === 'studNews') {
        document.getElementById(com).style.display = "block";

    } else {
        document.getElementById(com).style.display = "flex";

    }
    event.currentTarget.classList.add("active");
  
    
}


document.getElementById("stucommDef").click();






//ASSIGNMENTS TABS

let openAssignsec = (event, ass) => {
    let c, v, assbtns, asstabs;

    //get all tab contents, loop through and hide them
    asstabs = document.getElementsByClassName("ass_tab");
    for(c=0;c<asstabs.length;c++) {
        asstabs[c].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    assbtns = document.getElementsByClassName("assign_btn");
    for(v=0;v<assbtns.length;v++) {
        assbtns[v].className = assbtns[v].className.replace("active", " ");
    
    }


    //get tab content by id and display each when active class is targetted;
    
    document.getElementById(ass).style.display = "block";

    event.currentTarget.classList.add("active");
  
    
}


document.getElementById("main_assign_tab").click();




//SUBJECTS CONTENT TABS

let opensubjSec = (event, sub) => {
    let l, k, subjbtns, subjtabs;

    //get all tab contents, loop through and hide them
    subjtabs = document.getElementsByClassName("subj_content");
    for(l=0;l<subjtabs.length;l++) {
        subjtabs[l].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    subjbtns = document.getElementsByClassName("subj_btn_title");
    for(k=0;k<subjbtns.length;k++) {
        subjbtns[k].className = subjbtns[k].className.replace("active", " ");
    
    }


    //get tab content by id and display each when active class is targetted;
    
    document.getElementById(sub).style.display = "block";

    event.currentTarget.classList.add("active");
      
}

document.getElementById("subj_main_btn").click();


//Announcements CONTENT TABS

let openAnnstab = (event, anns) => {
    let h, f, annsbtns, annstabs;

    //get all tab contents, loop through and hide them
    annstabs = document.getElementsByClassName("annstabcont");
    for(h=0;h<annstabs.length;h++) {
        annstabs[h].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    annsbtns = document.getElementsByClassName("staannsbtn");
    for(f=0;f<annsbtns.length;f++) {
        annsbtns[f].className = annsbtns[f].className.replace("active", " ");
    
    }


    //get tab content by id and display each when active class is targetted;
    
    document.getElementById(anns).style.display = "block";

    event.currentTarget.classList.add("active");
  
    
}


document.getElementById("annstabBtn").click();


//NOTES CONTENT TABS

let openNotestab = (event, note) => {
    let g, q, notebtns, notetabs;

    //get all tab contents, loop through and hide them
    notetabs = document.getElementsByClassName("notestabcont");
    for(q=0;q<notetabs.length;q++) {
        notetabs[q].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    notebtns = document.getElementsByClassName("stanotebtn");
    for(g=0;g<notebtns.length;g++) {
        notebtns[g].className = notebtns[g].className.replace("active", " ");
    
    }


    //get tab content by id and display each when active class is targetted;
    
    document.getElementById(note).style.display = "block";

    event.currentTarget.classList.add("active");
  
    
}


document.getElementById("notetabBtn").click();



//Assignments CONTENT TABS

let openAsstab = (event, ass) => {
    let o, x, assbtns, asstabs;

    //get all tab contents, loop through and hide them
    asstabs = document.getElementsByClassName("asstabcont");
    for(o=0;o<asstabs.length;o++) {
        asstabs[o].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    assbtns = document.getElementsByClassName("staassbtn");
    for(x=0;x<assbtns.length;x++) {
        assbtns[x].className = assbtns[x].className.replace("active", " ");
    
    }


    //get tab content by id and display each when active class is targetted;
    
    document.getElementById(ass).style.display = "block";

    event.currentTarget.classList.add("active");
  
    
}


document.getElementById("asstabBtn").click();



//Exams CONTENT TABS

let openExamtab = (event, exam) => {
    let z, b, exambtns, examtabs;

    //get all tab contents, loop through and hide them
    examtabs = document.getElementsByClassName("examtabcont");
    for(z=0;z<examtabs.length;z++) {
        examtabs[z].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    exambtns = document.getElementsByClassName("staexambtn");
    for(b=0;b<exambtns.length;b++) {
        exambtns[b].className = exambtns[b].className.replace("active", " ");
    
    }


    //get tab content by id and display each when active class is targetted;
    
    document.getElementById(exam).style.display = "block";

    event.currentTarget.classList.add("active");
  
    
}


document.getElementById("examtabBtn").click();



//DISCUSSIONS CONTENT TABS

let openDistab = (event, dis) => {
    let c, a, disbtns, distabs;

    //get all tab contents, loop through and hide them
    distabs = document.getElementsByClassName("distabcont");
    for(a=0;a<distabs.length;a++) {
        distabs[a].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    disbtns = document.getElementsByClassName("stadisbtn");
    for(c=0;c<disbtns.length;c++) {
        disbtns[c].className = disbtns[c].className.replace("active", " ");
    
    }


    //get tab content by id and display each when active class is targetted;
    
    document.getElementById(dis).style.display = "block";

    event.currentTarget.classList.add("active");
  
    
}


document.getElementById("distabBtn").click();








