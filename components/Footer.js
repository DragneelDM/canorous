// components/Footer.tsx
import { FaLinkedin, FaTwitter, FaFacebook, FaInstagram } from "react-icons/fa";

export default function Footer() {
  return (
    <footer className="bg-gray-900 py-12 mt-16 text-center md:text-left">
      <div className="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-8 items-center">
        {/* Company Info */}
        <div>
          <h3 className="text-2xl font-bold text-white mb-2">Canorous Technologies</h3>
          <p className="text-gray-400">
            ISO 9001:2015 Certified
          </p>
        </div>

        {/* Social Links */}
        <div className="flex justify-center md:justify-center gap-6 text-gray-400 text-xl">
          <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" className="hover:text-white">
            <FaLinkedin />
          </a>
          <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" className="hover:text-white">
            <FaTwitter />
          </a>
          <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" className="hover:text-white">
            <FaFacebook />
          </a>
          <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" className="hover:text-white">
            <FaInstagram />
          </a>
        </div>

        {/* CTA */}
        <div className="flex justify-center md:justify-end">
          <a
            href="/contact"
            className="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition"
          >
            Contact Us
          </a>
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="mt-8 text-gray-500 text-sm text-center">
        © {new Date().getFullYear()} Canorous. All rights reserved.
      </div>
    </footer>
  );
}
