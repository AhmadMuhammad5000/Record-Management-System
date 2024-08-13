
let empty = document.getElementById("empty");
let search = document.getElementById("input");
let form = document.getElementById("form");
let output;

form.onsubmit = (e) =>{
    e.preventDefault();
}

search.onkeyup = () =>{
setInterval(() =>{
    let xml = new XMLHttpRequest()  || new ActiveXObject();
    xml.open("POST","../admin/search_lab_record.php", true);

    xml.onreadystatechange = () =>{
        if(xml.readyState === 4) {
            if(xml.status === 200) {
                let data = xml.response;
                    if(search.value === "") {
                        empty.innerHTML = "";
                                             
                   } else if(search.value != ""){
                       empty.innerHTML = data;
                }
            }
        }
        

  }

 let formdata = new FormData(form);
xml.send(formdata);
},1000)

}