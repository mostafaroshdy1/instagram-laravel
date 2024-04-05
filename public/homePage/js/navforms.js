document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('.link');
    const formContainer = document.querySelector('.formcontainer');

    navLinks[0].click();
    console.log(navLinks[0].click());
    navLinks.forEach(link => {
        link.addEventListener('click', async (event) => {
            event.preventDefault();
            navLinks.forEach(link => {
                link.classList.remove('active_nav');
            });
            link.classList.add('active_nav');
            const formId = link.getAttribute('data-form');
            const userId = link.getAttribute('data-user-id');

            try {
                const response = await fetch(`/users/${userId}/edit/${formId}`);
                if (!response.ok) {
                    throw new Error('Failed to fetch form');
                }
                const formData = await response.text();

                formContainer.innerHTML = formData;
            } catch (error) {
                console.error('Error fetching form:', error);
            }
        });
    });
});