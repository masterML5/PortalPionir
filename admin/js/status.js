
setTimeout(function(){
    let status = document.getElementById('status');
    status.style.display = 'none';
},
5000);

const checkboxValue = checkbox =>{
    let prikaz = document.getElementById('checkbox');
    const output = checkbox.checked ? 'Yes' : 'No';
    prikaz.value = output; 

}



rows = document.getElementsByTagName('tr');
for (let i = 0; i < rows.length; i++){
    
    labelstatus = document.querySelectorAll(".label.labelstatus");
    str = labelstatus[i].innerText;
    str = str.replace(/\s+/g, '');
    
    if(str == 'Da'){
       labelstatus[i].classList.add('label-success');
     }
     else{
         labelstatus[i].classList.add('label-danger');
     }
}




// for (let i = 0; i < rows.length; i++) {
// if(str == 'Da'){
//     labelstatus.classList.add('label-success');
// }
// else{
//     labelstatus.classList.add('label-danger');
// }
// }