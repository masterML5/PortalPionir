
let sve = document.getElementById('vreme_sve');
let subotica = document.getElementById('vreme_sub');
let beograd = document.getElementById('vreme_bgd');
let paracin = document.getElementById('vreme_par');
let prokuplje = document.getElementById('vreme_pro');

let svi_gradovi = ['subotica', 'beograd', 'paracin', 'prokuplje'];

console.log(svi_gradovi);



const date = new Date();
let today = date.getTime();
let expires = 2 * 30 * 24 * 60 * 60 * 1000;
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

const kuki = document.cookie.slice(6);
let imena = kuki.split("-");
imena = imena.filter(Boolean);
let brojvremena = imena.length;
if(imena[0] == 'sve'){
    brojvremena = 4;
}
let vremenska = document.getElementById('vremenska_baner');
vremenska.style.display = "grid";
vremenska.style.gridTemplateColumns = `repeat(${brojvremena}, 3fr)`;

let ptags = document.getElementsByTagName('p');
ptagslen = ptags.length;
for(let l = 0; l < brojvremena; l++){
    for(let m = 0; m < ptagslen; m++)
   if(imena[l] == ptags[m].innerText.toLowerCase()){
        ptags[m].style.display = 'block';
       
   }else if(imena )
}






























































