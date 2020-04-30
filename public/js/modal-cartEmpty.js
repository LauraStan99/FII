var modal = document.querySelector('.modal-cartEmpty');
var trigger = document.querySelector('.trigger-cartEmpty');
var closeButton = document.querySelector('.close-button-cartEmpty');

function toggleModal() {
  modal.classList.toggle('show-modal');
}

function windowOnClick(event) {
  if (event.target === modal) {
    toggleModal();
  }
}

trigger.addEventListener('click', toggleModal);
closeButton.addEventListener('click', toggleModal);
window.addEventListener('click', windowOnClick);
