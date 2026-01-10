// Contact form submission handler
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contact-form');
    
    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(contactForm);
            const submitButton = contactForm.querySelector('button[type="submit"]');
            const statusMessage = document.getElementById('form-status');
            
            // Disable submit button
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = 'Sending...';
            }
            
            // Clear previous status
            if (statusMessage) {
                statusMessage.textContent = '';
                statusMessage.className = '';
            }
            
            try {
                const response = await fetch('/contact.php', {
                    method: 'POST',
                    body: formData,
                });
                
                const data = await response.json();
                
                if (data.status === 'success') {
                    if (statusMessage) {
                        statusMessage.textContent = data.message;
                        statusMessage.className = 'mt-4 text-center text-green-400';
                    }
                    contactForm.reset();
                } else {
                    if (statusMessage) {
                        statusMessage.textContent = data.message;
                        statusMessage.className = 'mt-4 text-center text-red-400';
                    }
                }
            } catch (err) {
                if (statusMessage) {
                    statusMessage.textContent = 'Something went wrong. Please try again.';
                    statusMessage.className = 'mt-4 text-center text-red-400';
                }
            } finally {
                // Re-enable submit button
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = 'Send Message';
                }
            }
        });
    }
});
