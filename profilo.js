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

//------------------------------------

function fetchComment() {
    fetch("fetch_commentip.php").then(fetchResponse).then(fetchCommentsJson);
  }
  
  function fetchResponse(response){
    if (!response.ok) { return null; }
    return response.json();
  }
  
  function fetchCommentsJson(json) {
    if (!json.length) { noResults(); return; }

  const container = document.getElementById('container2');
    container.innerHTML = '';
    container.className = 'comments-container';
    const form = document.createElement('form');
    form.method = 'POST'; 

    for (let comment of json) {
        const card = document.createElement('div');
        card.dataset.id = comment.idcommento;
        card.classList.add('commento');
        
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.id = comment.idcommento;
        checkbox.name = 'checkbox-' + comment.idcommento;
        checkbox.classList.add('checkbox');
        
        const commentText = document.createElement('p');
        commentText.innerHTML = comment.commento;
        
        card.appendChild(commentText);
        card.appendChild(checkbox);
        form.appendChild(checkbox);
        container.appendChild(card);
    }

    const bottone = document.createElement('input');
    bottone.type = 'submit';
    bottone.value = 'Elimina commento';
    form.appendChild(bottone);
    container.appendChild(form);
}
  
  function noResults() {
    const container = document.getElementById('container2');
    container.innerHTML = '';
    const nores = document.createElement('div');
    nores.className = "nores";
    nores.textContent = "Nessun commento rilasciato";
    container.appendChild(nores);
  }
  
  fetchComment();