document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.pill-btn');
    const sections = document.querySelectorAll('div[id], main[id]'); // Select divs and main with IDs (sections)

    function changeLinkState() {
        let current = '';

        // Check if we are at the bottom of the page
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 50) {
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
});
