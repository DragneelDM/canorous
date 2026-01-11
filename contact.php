<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$page_title = 'Contact Us | Canorous';
$page_description = 'Get in touch with Canorous Technologies. Reach out for projects, collaborations, or inquiries.';
$page_keywords = 'contact Canorous, engineering services, manufacturing, 3D visualization, Unreal Studio';

$status = null;
$statusMessage = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"] ?? '');
    $email = filter_var($_POST["email"] ?? '', FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"] ?? '');
    $message = htmlspecialchars($_POST["message"] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status = 'error';
        $statusMessage = 'Invalid email format!';
    } elseif (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $status = 'error';
        $statusMessage = 'All fields are required!';
    } else {
        try {
            require __DIR__ . '/vendor/autoload.php'; // Ensure PHPMailer is installed
            
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'mail.can-india.co.in';
            $mail->SMTPAuth = true;
            $mail->Username = 'sales@can-india.co.in';
            $mail->Password = 'canorous@sales';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom($email, $name);
            $mail->addAddress('sales@can-india.co.in');
            $mail->Subject = $subject;
            $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

            $mail->send();
            $status = 'success';
            $statusMessage = 'Your message has been sent successfully!';
            
            // Clear form data after successful submission
            $name = $email = $subject = $message = '';
        } catch (Exception $e) {
            $status = 'error';
            $statusMessage = 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
?>

<main class="min-h-screen bg-gray-950 text-white px-4 sm:px-6 md:px-8 lg:px-12 py-12 sm:py-16">
    <section class="text-center mb-8 sm:mb-12">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-4">Get in Touch</h1>
        <p class="text-sm sm:text-base md:text-lg text-gray-300 max-w-2xl mx-auto px-4">
            Have a project or collaboration in mind? Reach out to us and we'll get back to you as soon as possible.
        </p>
    </section>

    <!-- Consultation CTA -->
    <section class="max-w-4xl mx-auto mb-8 sm:mb-12">
        <div class="bg-gradient-to-r from-blue-900/30 to-blue-800/30 rounded-2xl p-6 sm:p-8 border border-blue-700/30">
            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-3 sm:mb-4 text-center">
                Schedule a Free Consultation
            </h2>
            <p class="text-sm sm:text-base md:text-lg text-gray-300 text-center mb-4 sm:mb-6">
                Not sure where to start? Book a 30-minute call to discuss your project needs and explore how our integrated engineering, manufacturing, and VR capabilities can deliver results.
            </p>
            <div class="text-center">
                <a
                    href="mailto:sales@can-india.co.in?subject=Schedule%20Consultation"
                    class="inline-block w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-4 text-sm sm:text-base bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all shadow-lg"
                >
                    Book a Call →
                </a>
            </div>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-10 md:gap-12 max-w-6xl mx-auto">
        <!-- Form -->
        <form
            class="bg-gray-800 p-6 sm:p-8 rounded-lg shadow-lg flex flex-col gap-4"
            method="POST"
            action=""
        >
            <input 
                type="text" 
                name="name" 
                placeholder="Your Name" 
                required 
                value="<?= isset($name) ? h($name) : '' ?>"
                class="p-3 rounded-md bg-gray-700 text-white placeholder-gray-400" 
            />
            <input
                type="email"
                name="email"
                placeholder="Your Email"
                required
                value="<?= isset($email) ? h($email) : '' ?>"
                class="p-3 rounded-md bg-gray-700 text-white placeholder-gray-400"
            />
            <select
                name="subject"
                required
                class="p-3 rounded-md bg-gray-700 text-white"
            >
                <option value="">Select inquiry type...</option>
                <option value="Engineering & FEA" <?= (isset($subject) && $subject === 'Engineering & FEA') ? 'selected' : '' ?>>Engineering & FEA Simulation</option>
                <option value="Manufacturing" <?= (isset($subject) && $subject === 'Manufacturing') ? 'selected' : '' ?>>Manufacturing & Supply Chain</option>
                <option value="Unreal Studio & VR" <?= (isset($subject) && $subject === 'Unreal Studio & VR') ? 'selected' : '' ?>>Unreal Studio & VR/AR Project</option>
                <option value="3D Asset Creation" <?= (isset($subject) && $subject === '3D Asset Creation') ? 'selected' : '' ?>>3D Asset Creation</option>
                <option value="Solutions Consultation" <?= (isset($subject) && $subject === 'Solutions Consultation') ? 'selected' : '' ?>>Solutions Consultation</option>
                <option value="General" <?= (isset($subject) && $subject === 'General') ? 'selected' : '' ?>>General Inquiry</option>
            </select>
            <textarea 
                name="message" 
                rows="5" 
                placeholder="Your Message" 
                required 
                class="p-3 rounded-md bg-gray-700 text-white placeholder-gray-400"
            ><?= isset($message) ? h($message) : '' ?></textarea>

            <button
                type="submit"
                class="mt-2 w-full sm:w-auto px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-base font-semibold rounded-md transition"
            >
                Send Message
            </button>

            <!-- Status Messages -->
            <?php if ($status): ?>
                <p class="mt-4 text-center <?= $status === 'success' ? 'text-green-400' : 'text-red-400' ?>">
                    <?= h($statusMessage) ?>
                </p>
            <?php endif; ?>
        </form>

        <!-- Company Info -->
        <div class="flex flex-col justify-between gap-6 mt-8 md:mt-0">
            <div>
                <h3 class="text-xl sm:text-2xl font-semibold mb-2 sm:mb-3">Contact Info</h3>
                <p>Canorous Technologies</p>
                <p>96-A, 1st Floor, Bharathi Colony,</p>
                <p>2nd Cross East, Peelamedu,</p>
                <p>Coimbatore - 641004</p>
                <p>Email: sales@can-india.co.in</p>
                <p>Phone: +91 90877 44900</p>
            </div>

            <div>
                <h3 class="text-xl sm:text-2xl font-semibold mb-2 sm:mb-3">Follow Us</h3>
                <div class="flex gap-4">
                    <a
                        href="https://www.linkedin.com/company/canorous-technologies-private-limited"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="hover:text-white text-gray-400 p-2"
                    >
                        <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Optional Map -->
            <div class="mt-4 sm:mt-6">
                <div class="relative w-full" style="padding-bottom: 56.25%;">
                    <iframe
                        title="Company Location"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.186442005166!2d76.99290941169326!3d11.024634189094323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859ea69a84195%3A0xc7a8f1e8bad2d002!2sCanorous%20Technologies!5e0!3m2!1sen!2sin!4v1758534697357!5m2!1sen!2sin"
                        class="absolute inset-0 w-full h-full rounded-lg border-0"
                        allowfullscreen
                        loading="lazy"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
