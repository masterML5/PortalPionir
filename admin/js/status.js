
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


function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toLowerCase();
    filter2 = filter.trim();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    colslen = document.getElementById('myTable').rows[0].cells.length

  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        for(j=0; j<colslen; j++){
      td = tr[i].getElementsByTagName("td")[j];

           
        
      if (td) {
        
        txtValue = td.innerText.toLowerCase();
        
        txtValue2 = txtValue.trim();


        if (txtValue2.indexOf(filter2) > -1){
          tr[i].style.display = "";
        
        break;
        } else {
          tr[i].style.display = "none";
      
        }
       }
    }
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