    <footer class="bg-gray-900 py-12 text-center md:text-left">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-8 items-center">
            <!-- Company Info -->
            <div>
                <h3 class="text-2xl font-bold text-white mb-2">Canorous Technologies</h3>
                <p class="text-gray-400">
                    ISO 9001:2015 Certified
                </p>
            </div>

            <!-- Social Links -->
            <div class="flex justify-center md:justify-center gap-6 text-gray-400 text-xl">
                <a href="https://www.linkedin.com/company/canorous-technologies-private-limited" target="_blank" rel="noopener noreferrer" class="hover:text-white">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                </a>
            </div>

            <!-- CTA -->
            <div class="flex justify-center md:justify-end">
                <a
                    href="<?= asset('contact.php') ?>"
                    class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition"
                >
                    Contact Us
                </a>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-8 text-gray-500 text-sm text-center">
            © <?= date('Y') ?> Canorous. All rights reserved.
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="<?= asset('assets/js/mobile-menu.js') ?>"></script>
</body>
</html>
