document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.pill-btn');
    const sections = document.querySelectorAll('div[id]'); // Select divs with IDs (sections)

    function changeLinkState() {
        let index = sections.length;

        while (--index && window.scrollY + 150 < sections[index].offsetTop) { }

        navLinks.forEach((link) => link.classList.remove('active'));

        // Find the link that corresponds to the current section
        // We match the href attribute of the link with the id of the section
        if (index >= 0) {
            const currentSectionId = sections[index].id;
            const activeLink = document.querySelector(`.pill-btn[href="#${currentSectionId}"]`);
            if (activeLink) {
                activeLink.classList.add('active');
            }
        }
    }

    changeLinkState();
    window.addEventListener('scroll', changeLinkState);
});
