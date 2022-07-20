
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
  document.getElementById('cancelinput').style.display = 'block';
}
uploadBtn.addEventListener('click', checkFile);
function checkFile(event){
    if(input.files.length === 0){
        warning.innerHTML= "Morate izabrati fajl!"    
        warning.style.display='block';
        setTimeout(()=>
        {
        warning.style.display = 'none';
        },5000)
    }
}

document.getElementById('cancelinput').addEventListener('click', e =>{
    input.value = '';
    infoArea.textContent = '';
    document.getElementById('cancelinput').style.display = 'none';

})
// uploadBtn.addEventListener('click', e  =>{
//     e.preventDefault();
//     if(input.files.length === 0){
//         warning.innerHTML= "Morate izabrati fajl!"
//     }
// })
function copyFunction(){
    navigator.clipboard.writeText(document.getElementById('linkZaPreuz').textContent)
    document.getElementById('infoCopy').innerHTML="Link je kopiran";
    document.getElementById('infoCopy').style.display = 'block';
    setTimeout(()=>
    {
    document.getElementById('infoCopy').style.display = 'none';
    },1500)
}