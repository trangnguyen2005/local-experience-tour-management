document.querySelectorAll('.navbar-toggler').forEach((button) => {
    button.addEventListener('click', () => {
        const target = document.getElementById(button.getAttribute('aria-controls'));

        if (!target) {
            return;
        }

        const isOpen = target.classList.toggle('show');

        button.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
});
