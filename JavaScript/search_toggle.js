
let btn = document.getElementById("btn");
let input = document.getElementById("input");
let i = false;

btn.addEventListener("mouseover", () =>{
     if(i === false) {
         input.setAttribute("id", "output");
         btn.setAttribute("id","btn1");     
         i=true;
     } else{
        if(input.value != "") {
            btn.setAttribute("id","btn1");     
            i=false;
        } else{
            input.setAttribute("id", "input");
            btn.setAttribute("id","btn");     
            i=false;
        }
        
     }
})
