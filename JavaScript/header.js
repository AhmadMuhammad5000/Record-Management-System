
var toggler = document.getElementById("toggler");
var menu = document.getElementById("sidemenu");

let display = false;

toggler.addEventListener("click", () =>{
    if(display == false){
        menu.setAttribute("class","sidemenu");
        display = true;
      } else{
        menu.setAttribute("class","sidemenu1");
        display = false;

      }
});

