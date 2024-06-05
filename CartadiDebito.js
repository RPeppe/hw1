const comparsa = document.querySelector('#containernav3');
let controllo2 = "false";

function menucomparsa()
{
  if(controllo2 === "true")
  {
    comparsa.classList.remove('mostradiv');
    controllo2 = "false";
  }
  else
  {
    comparsa.classList.add('mostradiv');
    controllo2 = "true"; 
  }

}

let menu = document.querySelector('.opzione4'); 
menu.addEventListener('click', menucomparsa );
