import Hero from "@components/Hero";
import PortfolioGrid from "@components/PortfolioGrid";
import ClientsSection from "@components/ClientsSection";

import manufacturingData from "@data/manufacturing.json";

export default function Manufacturing() {
  return (
    <main>
      {/* Hero */}
      <Hero
        headline="Canorous"
        subbrands={["Manufacturing"]}
        subtitle="Delivering fully assembled, tested products with global reach."
        ctaText="View Manufacturing Portfolio"
        ctaLink="#portfolio"
        backgroundType="video"
        backgroundVideo="/videos/globe.mp4"
        overlayColor="bg-gray-900/50"
        loop={1}
      />

      {/* Clients Section */}
      <ClientsSection page="landing" />


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

        {/* Globe Video */}
        <div className="flex justify-center">
          <video
            autoPlay
            loop
            muted
            playsInline
            className="rounded-lg shadow-lg max-h-80 object-cover"
          >
            <source src="/videos/globe.mp4" type="video/mp4" />
            <source src="/videos/globe.webm" type="video/webm" />
            Your browser does not support the video tag.
          </video>
        </div>
      </section>
    </main>
  );
}
