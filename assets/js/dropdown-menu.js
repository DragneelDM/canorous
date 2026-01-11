/**
 * Dropdown Menu JavaScript
 * Handles desktop and mobile dropdown functionality
 */

document.addEventListener('DOMContentLoaded', function() {
    // Desktop Dropdown Functionality
    const dropdownContainers = document.querySelectorAll('.dropdown-container');

    dropdownContainers.forEach(container => {
        const trigger = container.querySelector('.dropdown-trigger');
        const menu = container.querySelector('.dropdown-menu');
        const arrow = container.querySelector('.dropdown-arrow');

        if (!trigger || !menu || !arrow) return;

        let isOpen = false;

        // Toggle dropdown on click
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();

            // Close all other dropdowns first
            closeAllDropdowns();

            isOpen = !isOpen;
            menu.classList.toggle('hidden', !isOpen);
            arrow.style.transform = isOpen ? 'rotate(180deg)' : 'rotate(0deg)';
            trigger.setAttribute('aria-expanded', isOpen);
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!container.contains(e.target)) {
                isOpen = false;
                menu.classList.add('hidden');
                arrow.style.transform = 'rotate(0deg)';
                trigger.setAttribute('aria-expanded', 'false');
            }
        });

        // Close dropdown on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isOpen) {
                isOpen = false;
                menu.classList.add('hidden');
                arrow.style.transform = 'rotate(0deg)';
                trigger.setAttribute('aria-expanded', 'false');
            }
        });
    });

    function closeAllDropdowns() {
        dropdownContainers.forEach(container => {
            const menu = container.querySelector('.dropdown-menu');
            const arrow = container.querySelector('.dropdown-arrow');
            const trigger = container.querySelector('.dropdown-trigger');

            if (menu && arrow && trigger) {
                menu.classList.add('hidden');
                arrow.style.transform = 'rotate(0deg)';
                trigger.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Mobile Dropdown Functionality
    const mobileDropdowns = document.querySelectorAll('.mobile-dropdown');

    mobileDropdowns.forEach(dropdown => {
        const trigger = dropdown.querySelector('.mobile-dropdown-trigger');
        const menu = dropdown.querySelector('.mobile-dropdown-menu');
        const arrow = dropdown.querySelector('.mobile-dropdown-arrow');

        if (!trigger || !menu || !arrow) return;

        let isOpen = false;

        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();

            isOpen = !isOpen;
            menu.classList.toggle('hidden', !isOpen);
            arrow.style.transform = isOpen ? 'rotate(180deg)' : 'rotate(0deg)';
        });
    });

    // Mobile Menu Toggle (existing functionality)
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');

    if (mobileMenuButton && mobileMenu && menuIcon) {
        let mobileMenuOpen = false;

        mobileMenuButton.addEventListener('click', () => {
            mobileMenuOpen = !mobileMenuOpen;
            mobileMenu.classList.toggle('hidden', !mobileMenuOpen);
            menuIcon.textContent = mobileMenuOpen ? '✕' : '☰';
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (mobileMenuOpen && !mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                mobileMenuOpen = false;
                mobileMenu.classList.add('hidden');
                menuIcon.textContent = '☰';
            }
        });
    }
});
