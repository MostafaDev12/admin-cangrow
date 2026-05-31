// Mobile Menu Toggle Functionality with Tailwind CSS
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const closeMenu = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const languageSelect = document.getElementById('language-select');
    const languageSelect2 = document.getElementById('language-select2');
    
    // Function to open mobile menu
    function openMobileMenu() {
        mobileMenu.classList.remove('hidden', 'opacity-0', 'scale-95');
        mobileMenu.classList.add('flex', 'opacity-100', 'scale-100');
        document.body.classList.add('overflow-hidden'); // Prevent scrolling when menu is open
    }
    
    // Function to close mobile menu
    function closeMobileMenu() {
        mobileMenu.classList.remove('flex', 'opacity-100', 'scale-100');
        mobileMenu.classList.add('hidden', 'opacity-0', 'scale-95');
        document.body.classList.remove('overflow-hidden'); // Restore scrolling
    }
    
    // Event listener for hamburger menu button
    if (menuToggle) {
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault();
            openMobileMenu();
        });
    }
    
    // Event listener for close menu button
    if (closeMenu) {
        closeMenu.addEventListener('click', function(e) {
            e.preventDefault();
            closeMobileMenu();
        });
    }
    
    // Close menu when clicking outside of it
    if (mobileMenu) {
        mobileMenu.addEventListener('click', function(e) {
            // Only close if clicking on the backdrop (the mobile-menu div itself)
            if (e.target === mobileMenu) {
                closeMobileMenu();
            }
        });
    }
    
    // Close menu when pressing Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileMenu && !mobileMenu.classList.contains('hidden')) {
            closeMobileMenu();
        }
    });
    
    // Handle language selection change (mobile)
    if (languageSelect) {
        languageSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const href = selectedOption.getAttribute('data-href');
            if (href) {
                window.location.href = href;
            }
        });
    }
    
    // Handle language selection change (desktop)
    if (languageSelect2) {
        languageSelect2.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const href = selectedOption.getAttribute('data-href');
            if (href) {
                window.location.href = href;
            }
        });
    }
    
    // Close mobile menu when clicking on navigation links
    const mobileNavLinks = mobileMenu?.querySelectorAll('nav a');
    if (mobileNavLinks) {
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Add a small delay to allow navigation to start before closing menu
                setTimeout(closeMobileMenu, 100);
            });
        });
    }
});