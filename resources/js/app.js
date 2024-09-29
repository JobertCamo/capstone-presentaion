import './bootstrap';
import './function';







window.toggleSidebar = function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarContent = document.getElementById('sidebarcontent');
    // const phonebar = document.getElementById('phonebar');
    // const phonebarcontent = document.getElementById('phonebarcontent');

    if (sidebar.classList.contains('w-[300px]')) {
        sidebar.classList.remove('w-[300px]');
        sidebar.classList.add('w-[60px]');
        // phonebar.classList.remove('w-[300px]');
        // phonebarcontent.classList('hidden');
        // Smoothly hide content
        sidebarContent.classList.add('opacity-0');
        sidebarContent.classList.add('max-h-0'); // Collapse the content height
        setTimeout(() => {
            sidebarContent.classList.add('invisible');
        }, 300); // Match this with your transition duration
    } else {
        sidebar.classList.remove('w-[60px]');
        sidebar.classList.add('w-[300px]');
        // phonebar.classList.add('w-[300px]');
        // phonebarcontent.classList('bl')
        // Smoothly show content
        sidebarContent.classList.remove('invisible');
        sidebarContent.classList.remove('max-h-0');
        setTimeout(() => {
            sidebarContent.classList.remove('opacity-0');
        }, 10); // Small delay to trigger the transition properly
    }
};

window.toggleSidebar = function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarContent = document.getElementById('sidebarcontent');
    // const phonebar = document.getElementById('phonebar');
    // const phonebarcontent = document.getElementById('phonebarcontent');

    if (sidebar.classList.contains('w-[300px]')) {
        sidebar.classList.remove('w-[300px]');
        sidebar.classList.add('w-[60px]');
        // phonebar.classList.remove('w-[300px]');
        // phonebarcontent.classList('hidden');
        // Smoothly hide content
        sidebarContent.classList.add('opacity-0');
        sidebarContent.classList.add('max-h-0'); // Collapse the content height
        setTimeout(() => {
            sidebarContent.classList.add('invisible');
        }, 300); // Match this with your transition duration
    } else {
        sidebar.classList.remove('w-[60px]');
        sidebar.classList.add('w-[300px]');
        // phonebar.classList.add('w-[300px]');
        // phonebarcontent.classList('bl')
        // Smoothly show content
        sidebarContent.classList.remove('invisible');
        sidebarContent.classList.remove('max-h-0');
        setTimeout(() => {
            sidebarContent.classList.remove('opacity-0');
        }, 10); // Small delay to trigger the transition properly
    }
};
// Ensure the sidebar starts visible on larger screens
// function adjustMargin() {
//     const content = document.getElementById('content');
//     const sidebar = document.getElementById('sidebar');

//     if (window.innerWidth <= 639) {
//         // content.classList.remove('ml-[20%]');
//         sidebar.classList.add('-translate-x-full');
//     } else {
//         // content.classList.add('ml-[20%]');
//         sidebar.classList.remove('-translate-x-full');
//         sidebar.classList.add('translate-x-0');
//     }
// }

// window.addEventListener('load', adjustMargin);
// window.addEventListener('resize', adjustMargin);
