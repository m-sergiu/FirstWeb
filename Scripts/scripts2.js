/*
const close = document.getElementById('close');
const open = document.getElementById('open');
const modal = document.getElementById('modal2');


// Show modal
open.addEventListener('click', () => modal.classList.add('show-modal'));

// Hide modal
close.addEventListener('click', () => modal.classList.remove('show-modal'));

// Hide modal on outside click
window.addEventListener('click', e =>
    e.target == modal ? modal.classList.remove('show-modal') : false
);*/

var modal = document.getElementById('simpleModal');
var modalBtn = document.getElementById('modalBtn');
var closeBtn = document.getElementsByClassName('closeBtn')[0];

modalBtn.addEventListener('click',openModal);
closeBtn.addEventListener('click',closeModal);

function openModal(){
    modal.style.display = 'block';
}

function closeModal(){
    modal.style.display = 'none';
}

window.addEventListener('click', outsideClick);

function outsideClick(e){
    if(e.target == modal){
        modal.style.display = 'none';
    }
}

