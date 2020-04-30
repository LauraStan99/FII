var modal_fav = document.querySelector('.modal-fav');
var trigger_fav = document.querySelector('.trigger-fav');
var closeButton_fav = document.querySelector('.close-button-fav');

function toggleModal_fav() {
  modal_fav.classList.toggle('show-modal');
}

function windowOnClick(event) {
  if (event.target === modal_fav) {
    toggleModal_fav();
  }
}

trigger_fav.addEventListener('click', toggleModal_fav);
closeButton_fav.addEventListener('click', toggleModal_fav);
window.addEventListener('click', windowOnClick);
