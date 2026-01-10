// Mobile menu toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    
    if (menuButton && mobileMenu && menuIcon) {
        menuButton.addEventListener('click', function() {
            const isHidden = mobileMenu.classList.contains('hidden');
            
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                menuIcon.textContent = '✕';
            } else {
                mobileMenu.classList.add('hidden');
                menuIcon.textContent = '☰';
            }
        });
    }
});
