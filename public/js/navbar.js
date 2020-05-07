function selectWoman() {
  document.getElementById('DropF').classList.toggle('show');
}
function selectMen() {
  document.getElementById('DropB').classList.toggle('show');
}
function selectChildren() {
  document.getElementById('DropC').classList.toggle('show');
}

window.onclick = function (e) {
  if (!e.target.matches('.femei-buton')) {
    var myDropdown = document.getElementById('DropF');
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  } else if (!e.target.matches('.barbati-buton')) {
    var myDropdown = document.getElementById('DropB');
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  } else if (!e.target.matches('.copii-buton')) {
    var myDropdown = document.getElementById('DropC');
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  } 
};
