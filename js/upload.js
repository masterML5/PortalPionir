var input = document.getElementById('fileUpload');
let infoArea = document.getElementById('infoArea');
let uploadBtn = document.getElementById('uploadBtn');
let warning = document.getElementById('warning');
input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  // the change event gives us the input it occurred in 
  var input = event.srcElement;
  
  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
  var fileName = input.files[0].name;
  
  
  // use fileName however fits your app best, i.e. add it into a div
  infoArea.innerHTML = fileName;
}
uploadBtn.addEventListener('click', checkFile);
function checkFile(event){
    if(input.files.length === 0){
        warning.innerHTML= "Morate izabrati fajl!"
    }
}