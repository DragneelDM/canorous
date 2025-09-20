export default function CTASection({ text, link }) {
  return (
    <section className="bg-blue-600 py-12 text-center rounded-lg mt-16 mx-4 md:mx-0">
      <h3 className="text-2xl font-bold text-white mb-4">{text}</h3>
      <a href={link} className="px-6 py-3 bg-white text-blue-600 font-semibold rounded-md hover:bg-gray-200 transition">
        Contact Us
      </a>
    </section>
  );
}
