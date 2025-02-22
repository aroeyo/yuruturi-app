document.addEventListener('DOMContentLoaded', function() {
    const trigger = document.querySelector('.menu-trigger');
    
    trigger.addEventListener('click', function() {
        document.body.classList.toggle('menu-open');
    });
});