let listaf = ['Img/Img15.png', 'Img/Img16.png', 'Img/Img17.png'];

function mostrainformazioni()
{
  let container = document.querySelector('#divconto div#flex-conto');
  container.classList.remove('hidden');

    
  for(let i=0; i<listaf.length; i++)
  {
    let fotosrc = listaf[i];
    const img = document.createElement('img');
    img.src = fotosrc;
    img.classList.add('img');
    const testo = document.createElement('h3');
    testo.textContent = "BBVA";

    
    let flexc = document.getElementById('c'+(i+1));
    flexc.appendChild(img);
    flexc.appendChild(testo);
  }
  conto.removeEventListener('mouseover', mostrainformazioni);

}

function nascondi(){
  const container = document.querySelector('#divconto div#flex-conto');
  
  for(let i=0; i<listaf.length; i++)
  {
    let flexc = document.getElementById('c'+(i+1));

    while (flexc.firstChild) {
      flexc.removeChild(flexc.firstChild);
    }
  }

  container.classList.add('hidden');
  conto.addEventListener('mouseover', mostrainformazioni);
}


let conto = document.querySelector('h3#scritta');
conto.addEventListener('mouseover', mostrainformazioni);


let container2 = document.querySelector('section div#container8');
container2.addEventListener('click', nascondi);




//---------------------------------------------------------------
let image;

let limgnuove = ['Img/Img12.png', 'Img/Img13.png', 'Img/Img14.png'];
let limgvecchie = ['Img/Img8.png', 'Img/Img9.png', 'Img/Img10.png'];

function ritornafoto(event)
{
    const image = event.currentTarget;
    let indice = parseInt(image.dataset.servizio);
    image.src = limgvecchie[indice-1];
}

function cambiafoto(event)
{
  const image = event.currentTarget;
  let indice = parseInt(image.dataset.servizio);
  image.src = limgnuove[indice-1];
  image.classList.add('img');
  image.addEventListener('mouseout', ritornafoto);
}


image = document.getElementById('imgs1');
image.addEventListener('mouseover', cambiafoto);

image = document.getElementById('imgs2');
image.addEventListener('mouseover', cambiafoto);


image = document.getElementById('imgs3');
image.addEventListener('mouseover', cambiafoto);

//-------------------------------------------------------

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
