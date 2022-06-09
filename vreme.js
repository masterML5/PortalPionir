
let sve = document.getElementById('vreme_sve');
let subotica = document.getElementById('vreme_sub');
let beograd = document.getElementById('vreme_bgd');
let paracin = document.getElementById('vreme_par');
let prokuplje = document.getElementById('vreme_pro');

let svi_gradovi = ['subotica', 'beograd', 'paracin', 'prokuplje'];
let gradovilen = svi_gradovi.length;





const date = new Date();
let today = date.getTime();
let expires = 2147483647  * 1000;
date.setTime(today + expires);
let new_date = date.toUTCString();

function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    let res = "";
    for (let i = 1; i < checkboxes.length; i++) {

        if (checkboxes[0].checked == true){
            checkboxes[i].setAttribute('disabled', true);
            checkboxes[i].checked = false;
         
    }   else if(checkboxes[0].checked == false){

        checkboxes[i].removeAttribute('disabled', true);
        
    }
}
    for (let j = 1; j < checkboxes.length; j++){
    if(checkboxes[0].checked == true){
        document.cookie = `vreme=${sve.value}; expires=${new_date}`;
    }
    else if(checkboxes[j].checked == true && checkboxes[0].checked == false){

            
            res += checkboxes[j].value + "-";
        
        document.cookie = `vreme=${res}; expires=${new_date}`;
        
    }

}

}
var value = 'vreme'
var match = document.cookie.match(new RegExp('(^| )' + value + '=([^;]+)'));

const kuki = match[0].slice(6);
let imena = kuki.split("-");
imena = imena.filter(Boolean);
let brojvremena = imena.length;
if(imena[0] == 'sve'){
    brojvremena = 4;
}

let vremenska = document.getElementById('vremenska_baner');
vremenska.style.display = "grid";
vremenska.style.gridTemplateColumns = `repeat(${brojvremena}, 3fr)`;


let difference = svi_gradovi.filter(x => !imena.includes(x));
let diflen = difference.length;






let ptags = document.getElementsByTagName('p');
const ptagslen = ptags.length;

if(imena[0] == 'sve'){
    for(let i = 0; i < gradovilen; i++){
        for(let j = 0; j < ptagslen; j++){
            if(imena[i] == ptags[j].id.toLowerCase()){
                ptags[j].style.display = 'block';
            }
        }
    }
}else{





for(let l = 0; l < brojvremena; l++){
    for(let m = 0; m < ptagslen; m++){
 
   if(imena[l] == ptags[m].id.toLowerCase()){
     
        ptags[m].style.display = 'block';
   }
}
}

for(let i = 0; i < diflen; i++){
    for(let j = 0; j < ptagslen; j++){

        if(difference[i] == ptags[j].id.toLowerCase()){
            ptags[j].style.display = 'none';
        }
    }
}

}



























































