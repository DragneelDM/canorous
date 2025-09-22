"use client";

import { FaLinkedin } from "react-icons/fa";

export default function ContactPage() {
  return (
    <main className="min-h-screen bg-gray-900 text-white px-4 md:px-16 py-16">
      {/* Hero / Intro */}
      <section className="text-center mb-12">
        <h1 className="text-4xl md:text-5xl font-bold mb-4">Get in Touch</h1>
        <p className="text-gray-300 max-w-2xl mx-auto">
          Have a project or collaboration in mind? Reach out to us and we’ll get back to you as soon as possible.
        </p>
      </section>

      {/* Contact Form & Info */}
      <section className="grid md:grid-cols-2 gap-12">
        {/* Form */}
        <form
          className="bg-gray-800 p-8 rounded-lg shadow-lg flex flex-col gap-4"
          onSubmit={(e) => {
            e.preventDefault();
            alert("Form submitted! (Add backend integration)");
          }}
        >
          <input
            type="text"
            placeholder="Your Name"
            className="p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500"
            required
          />
          <input
            type="email"
            placeholder="Your Email"
            className="p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500"
            required
          />
          <textarea
            placeholder="Your Message"
            rows={5}
            className="p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500"
            required
          />
          <button
            type="submit"
            className="mt-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition"
          >
            Send Message
          </button>
        </form>

        {/* Company Info */}
        <div className="flex flex-col justify-between gap-6">
          <div>
            <h3 className="text-2xl font-semibold mb-2">Contact Info</h3>
            <p>Canorous Technologies</p>
            <p>96-A, 1st Floor, Bharathi Colony,</p>
            <p>2nd Cross East, Peelamedu,</p>
            <p>Coimbatore - 641004</p>
            <p>Email: sales@can-india.co.in</p>
            <p>Phone: +91 90877 44900</p>
          </div>

          <div>
            <h3 className="text-2xl font-semibold mb-2">Follow Us</h3>
            <div className="flex gap-4">
              <a href="https://www.linkedin.com/company/canorous-technologies-private-limited" target="_blank" rel="noopener noreferrer" className="hover:text-white">
            <FaLinkedin />
          </a>
            </div>
          </div>

          {/* Optional Map */}
          <div className="mt-6">
            <iframe
              title="Company Location"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.186442005166!2d76.99290941169326!3d11.024634189094323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859ea69a84195%3A0xc7a8f1e8bad2d002!2sCanorous%20Technologies!5e0!3m2!1sen!2sin!4v1758534697357!5m2!1sen!2sin"
              width="100%"
              height="200"
              className="rounded-lg border-0"
              allowFullScreen
              loading="lazy"
            ></iframe>
          </div>
        </div>
      </section>
    </main>
  );
}
