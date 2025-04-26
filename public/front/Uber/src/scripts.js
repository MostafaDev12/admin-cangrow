 // Toggle mobile menu
 const mobileMenuButton = document.getElementById('mobile-menu-button');
 const mobileMenu = document.getElementById('mobile-menu');
 
 mobileMenuButton.addEventListener('click', () => {
     mobileMenu.classList.toggle('hidden');
     
     // Toggle between bars and times icon
     const icon = mobileMenuButton.querySelector('i');
     if (mobileMenu.classList.contains('hidden')) {
         icon.classList.remove('fa-times');
         icon.classList.add('fa-bars');
     } else {
         icon.classList.remove('fa-bars');
         icon.classList.add('fa-times');
     }
 });