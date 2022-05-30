
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

