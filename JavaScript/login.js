  // this function will show the login options
  let options = document.getElementById("select");
  let show = false;

  function loginAs(){
      if(show === false){
         options.style.display = "block";
         show = true;
      } else{
          options.style.display = "none";
          show = false;
      }
  }

  