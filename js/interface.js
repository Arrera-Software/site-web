document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.pill-btn');
    const sections = document.querySelectorAll('div[id], main[id], section[id]'); // Select divs, mains, and sections with IDs

    function changeLinkState() {
        if (!sections.length) return;
        
        let current = sections[0].id; // Default to first section

        if (window.scrollY === 0) {
            current = sections[0].id;
        } else if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 50) {
            // Force the last section to be active if at bottom
            current = sections[sections.length - 1].id;
        } else {
            sections.forEach((section) => {
                const sectionTop = section.offsetTop;
                if (window.scrollY + 300 >= sectionTop) {
                    current = section.getAttribute('id');
                }
            });
        }

        navLinks.forEach((link) => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    }

    changeLinkState();
    window.addEventListener('scroll', changeLinkState);
    window.addEventListener('load', changeLinkState);
    window.addEventListener('resize', changeLinkState);
});
