let trainBtn = document.querySelectorAll('.btn-secondary');

trainBtn.forEach(function(btn){
    btn.addEventListener('click', function(e) {
        document.querySelector('textarea').append(btn.parentElement.previousElementSibling.textContent + ", ");
        e.preventDefault();
    })
})