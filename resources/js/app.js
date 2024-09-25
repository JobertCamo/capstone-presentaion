import './bootstrap';
import './function';

window.toggleSidebar = function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('content'); 

    if (sidebar.classList.contains('translate-x-0')) {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
        mainContent.classList.remove('ml-[20%]');
    } else {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
        mainContent.classList.add('ml-[20%]');
    }
};

// Ensure the sidebar starts visible on larger screens
function adjustMargin() {
    const content = document.getElementById('content');
    const sidebar = document.getElementById('sidebar');
    
    if (window.innerWidth <= 639) {
        content.classList.remove('ml-[20%]');
        sidebar.classList.add('-translate-x-full');
    } else {
        content.classList.add('ml-[20%]');
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
    }
}

window.addEventListener('load', adjustMargin);
window.addEventListener('resize', adjustMargin);
