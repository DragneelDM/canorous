import Hero from "@components/Hero";
import ServiceCard from "@components/ServiceCard";
import PortfolioGrid from "@components/PortfolioGrid";
import engineeringData from "@data/engineering.json";

export default function Engineering() {
  return (
    <main>
      <Hero
        subbrands={["Engineering"]}
        subtitle="Innovate Build"
        ctaText="View Portfolio"
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

      {/* Services */}
      <section className="max-w-7xl mx-auto py-16 px-4">
        <h2 className="text-3xl font-bold text-white mb-8 text-center">Our Expertise</h2>
        <div className="grid md:grid-cols-3 gap-8">
          <ServiceCard
            title="CAD & Technical Documentation"
            description="We provide complete CAD modeling and technical documentation for precise manufacturing processes."
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
        <PortfolioGrid data={engineeringData} />
      </section>
    </main>
  );
}
