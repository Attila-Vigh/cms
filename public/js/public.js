$(document).ready(function(){
    
    let sidenav = $(".sidenav").children();
    let subjectXY = 20;
    for (let i = 0; i < sidenav.length; i++) 
    {
        sidenav[i].style.top = `${subjectXY}px`;
        subjectXY += 60;

        let subject = $('.pages')[i].getAttribute('class').replace("pages ", "");
        let pages   = $(`.${subject}`).children();
        let pageXY = -55;
        for (let j = 0; j < pages.length; j++) 
        {
            pages[j].style.top = `${pageXY}px`;
            pageXY += 45 ;
        }
    }
});