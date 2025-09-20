import Hero from "@components/Hero";
import PortfolioGrid from "@components/PortfolioGrid";
import CTASection from "@components/CTASection";
import manufacturingData from "@data/manufacturing.json";

export default function Manufacturing() {
  return (
    <main>
      {/* Hero */}
      <Hero
        headline="Canorous Manufacturing"
        subtitle="Turnkey manufacturing solutions across valves, actuators, precision parts, and industrial assemblies."
        ctaText="See Our Work"
        ctaLink="#portfolio"
      />

      {/* Portfolio */}
      <section id="portfolio" className="max-w-7xl mx-auto py-16 px-4">
        <h2 className="text-3xl font-bold text-white mb-8 text-center">
          Our Manufactured Products
        </h2>
        <PortfolioGrid data={manufacturingData} />
      </section>

      {/* Global Trading */}
      <section className="max-w-7xl mx-auto py-16 px-4 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        {/* Text */}
        <div>
          <h2 className="text-2xl font-bold text-white mb-4">Global Trading</h2>
          <p className="text-gray-300 mb-6">
            Beyond manufacturing, Canorous facilitates global trade and
            distribution of industrial components. Our network enables seamless
            delivery to clients across multiple regions.
          </p>
        </div>

        {/* Image */}
        <div className="flex justify-center">
          <img
            src="/images/manufacturing/global-trading.jpg"
            alt="Global Trading"
            className="rounded-lg shadow-lg max-h-80 object-cover"
          />
        </div>
      </section>


      {/* CTA Section */}
      <CTASection
        text="Looking for a turnkey manufacturing partner?"
        link="/contact"
      />
    </main>
  );
}
