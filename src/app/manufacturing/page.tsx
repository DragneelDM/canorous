import Hero from "@components/Hero";
import PortfolioGrid from "@components/PortfolioGrid";

import manufacturingData from "@data/manufacturing.json";

export default function Manufacturing() {
  return (
    <main>
      {/* Hero */}
      <Hero
        subbrands={["Manufacturing"]}
        subtitle="Turnkey manufacturing solutions across valves, actuators, precision parts, and industrial assemblies."
        ctaText="See Our Work"
        ctaLink="#portfolio"
        loop={false}
      />

      {/* Clients Section */}
      <section className="bg-gray-900 py-12">
        <div className="max-w-7xl mx-auto px-4 text-center">
          <h2 className="text-2xl font-bold text-white mb-8">Trusted By</h2>
          <div className="overflow-hidden relative">
            <div className="flex gap-12 animate-marquee">
              {/* Duplicate logos for infinite effect */}
              <img src="/images/clients/client1.png" alt="Client 1" className="h-12" />
              <img src="/images/clients/client2.png" alt="Client 2" className="h-12" />
              <img src="/images/clients/client3.png" alt="Client 3" className="h-12" />
              <img src="/images/clients/client4.png" alt="Client 4" className="h-12" />
              <img src="/images/clients/client5.png" alt="Client 5" className="h-12" />
            </div>
          </div>
        </div>
      </section>


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
    </main>
  );
}
