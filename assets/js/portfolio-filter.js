/**
 * Portfolio Filter JavaScript
 * Handles filtering portfolio items by category
 */

document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.portfolio-filter');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    const noResults = document.getElementById('no-results');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');

            // Update active button state
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-red-600');
                btn.classList.add('bg-gray-800');
            });
            button.classList.add('active', 'bg-red-600');
            button.classList.remove('bg-gray-800');

            // Filter portfolio items
            let visibleCount = 0;

            portfolioItems.forEach(item => {
                const category = item.getAttribute('data-category');

                if (filter === 'all' || category === filter) {
                    item.style.display = 'block';
                    // Fade in animation
                    item.style.opacity = '0';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transition = 'opacity 0.3s ease-in-out';
                    }, 10);
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show/hide "no results" message
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });
    });
});

/**
 * Open project modal
 */
function openModal(project) {
    const modal = document.getElementById('project-modal');
    const modalContent = document.getElementById('modal-content');

    // Build modal content
    const content = `
        <div class="relative h-96 overflow-hidden">
            <img
                src="${project.image}"
                alt="${project.title}"
                class="w-full h-full object-cover"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent"></div>
        </div>

        <div class="p-8">
            <div class="mb-4">
                <span class="px-3 py-1 bg-red-600/20 text-red-300 rounded-full text-sm font-semibold border border-red-500/30">
                    ${project.categoryLabel}
                </span>
            </div>

            <h2 class="text-3xl font-bold text-white mb-4">
                ${project.title}
            </h2>

            <p class="text-gray-300 text-lg mb-6">
                ${project.description}
            </p>

            ${project.category ? `
                <div class="bg-gray-800/50 rounded-lg p-4 border border-gray-700 mb-6">
                    <p class="text-sm text-gray-400 uppercase tracking-wide mb-2">Category</p>
                    <p class="text-white">${project.category}</p>
                </div>
            ` : ''}

            <div class="flex gap-4">
                <a
                    href="contact.php"
                    class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold rounded-lg hover:from-red-600 hover:to-red-700 transition-all"
                >
                    Start Similar Project
                </a>
                <button
                    onclick="closeModal()"
                    class="px-6 py-3 bg-gray-800 text-white font-semibold rounded-lg hover:bg-gray-700 transition-all border border-gray-700"
                >
                    Close
                </button>
            </div>
        </div>
    `;

    modalContent.innerHTML = content;
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

/**
 * Close project modal
 */
function closeModal(event) {
    // Only close if clicking the backdrop or close button
    if (!event || event.target.id === 'project-modal' || event.type === 'click') {
        const modal = document.getElementById('project-modal');
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // Restore scrolling
    }
}

// Close modal on ESC key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeModal();
    }
});
