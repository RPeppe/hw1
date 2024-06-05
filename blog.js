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

function fetchComments() {
  fetch("fetch_comment.php").then(fetchResponse).then(fetchCommentsJson);
}

function fetchResponse(response) {
  if (!response.ok) { return null; }
  return response.json();
}

function fetchCommentsJson(json) {
  if (!json.length) { noResults(); return; }
  
  const container = document.getElementById('container3');
  container.innerHTML = '';
  container.className = 'comments-container';

for (let comment of json) {
  const card = document.createElement('div');
  card.dataset.id = comment.idcliente;
  console.log(card.dataset.id); //id del commento
  card.classList.add('commento');
  const commentTitolo = document.createElement('h3');
  commentTitolo.innerHTML = comment.username+": ";
  console.log(comment.username);
  const commentText = document.createElement('p');
  commentText.innerHTML = comment.commento;
  console.log(commentText);
  card.appendChild(commentTitolo);
  card.appendChild(commentText);
  container.appendChild(card);
}
}

function noResults() {
  const container = document.getElementById('container3');
  container.innerHTML = '';
  const nores = document.createElement('div');
  nores.className = "nores";
  nores.textContent = "No comments found.";
  container.appendChild(nores);
}

fetchComments();