/**
 * Shared global UI behavior.
 * Keep this file as the single source of truth for sidebar state.
 */
document.addEventListener('DOMContentLoaded', function () {
    if (window.smartWillsSidebarBootstrapped) {
        return;
    }

    window.smartWillsSidebarBootstrapped = true;

    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const sidebar = document.querySelector('.sidebar');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');

    function closeSidebar() {
        if (hamburgerMenu) {
            hamburgerMenu.classList.remove('active');
            hamburgerMenu.classList.remove('hide');
        }

        if (sidebar) {
            sidebar.classList.remove('active');
        }

        if (sidebarOverlay) {
            sidebarOverlay.classList.remove('active');
        }

        document.body.classList.remove('no-scroll');
        document.body.classList.remove('sidebar-open');
    }

    if (hamburgerMenu && sidebar && sidebarOverlay) {
        hamburgerMenu.addEventListener('click', function (event) {
            event.stopPropagation();

            const isOpening = !sidebar.classList.contains('active');
            hamburgerMenu.classList.toggle('active');
            sidebar.classList.toggle('active');
            sidebarOverlay.classList.toggle('active');

            if (isOpening) {
                hamburgerMenu.classList.add('hide');
                document.body.classList.add('no-scroll');
                document.body.classList.add('sidebar-open');
            } else {
                closeSidebar();
            }
        });

        sidebarOverlay.addEventListener('click', closeSidebar);
    }

    document.querySelectorAll('.sidebar-menu a, .sidebar-footer a').forEach(function (link) {
        link.addEventListener('click', function () {
            if (window.innerWidth <= 768) {
                closeSidebar();
            }
        });
    });

    document.addEventListener('click', function (event) {
        if (
            sidebar &&
            hamburgerMenu &&
            !sidebar.contains(event.target) &&
            !hamburgerMenu.contains(event.target) &&
            window.innerWidth <= 768
        ) {
            closeSidebar();
        }
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 768) {
            closeSidebar();
        }
    });
});
