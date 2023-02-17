<?php

?>

const trainBtn = document.querySelector('.btn-secondary');

console.log(trainBtn);

let cellText = trainBtn.parentElement.previousElementSibling.previousElementSibling.textContent;
console.log(cellText);

const contact = window.location.href = "";
console.log(contact);

trainBtn.addEventListener('click', runEvent);

function runEvent(e) {

}

window.