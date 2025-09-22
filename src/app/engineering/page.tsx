import Hero from "@components/Hero";
import ServiceCard from "@components/ServiceCard";
import PortfolioSliderOriginalSize from "@components/PortfolioSliderOriginalSize";
import ClientsSection from "@components/ClientsSection";
import engineeringData from "@data/engineering.json";

export default function Engineering() {
  return (
    <main>
      <Hero
        headline="Canorous"
        subbrands={["Engineering"]}
        subtitle="Engineering solutions that optimize efficiency, safety, and sustainability."
        ctaText="Explore Engineering Work"
        ctaLink="#portfolio"
        backgroundType="gradient"
        overlayColor="bg-gray-900/60"
        loop={1}
      />

      {/* Clients Section */}
      <ClientsSection page="manufacturing" />

      {/* Services */}
      <section className="max-w-7xl mx-auto py-16 px-4">
        <h2 className="text-3xl font-bold text-white mb-8 text-center">Our Expertise</h2>
        <div className="grid md:grid-cols-3 gap-8">
          <ServiceCard
            title="Technical Documentation"
            description="We provide complete analysis, modeling and technical documentation for precise manufacturing processes."
            icon="🖊️"
          />
          <ServiceCard
            title="MEP / Infra Solutions"
            description="Mechanical, electrical, plumbing, and fire protection solutions for infrastructure compliance."
            icon="🏗️"
          />
          <ServiceCard
            title="Mechanical / Electrical / Plumbing"
            description="End-to-end design, assembly, and testing for mechanical components, electrical systems, and plumbing networks."
            icon="⚙️"
          />
        </div>
      </section>

      {/* Portfolio */}
      <section id="portfolio" className="max-w-7xl mx-auto py-16 px-4">
        <h2 className="text-3xl font-bold text-white mb-8 text-center">Manufacturing Portfolio</h2>
        <PortfolioSliderOriginalSize data={engineeringData} />
      </section>
    </main>
  );
}
