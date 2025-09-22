import Hero from "@components/Hero";
import PhilosophySection from "@components/PhilosophySection";
import ServicesSection from "@components/ServicesSection";
import PortfolioCarousel from "@components/PortfolioCarousel";
import ClientsSection from "@components/ClientsSection";

export default function Home() {
  return (
    <main>
      <Hero
        headline="Canorous"
        subbrands={["Unreal Studio", "3D Studio", "Engineering", "Manufacturing"]}
        subtitle="Immersation and Innovation"
        ctaText="Find your end to end solutions Today"
        ctaLink="#portfolio"
        backgroundType="video"
        backgroundVideo="/videos/unreal-demo.mp4"
        overlayColor="bg-gray-900/50"
      />

      <PhilosophySection />

      <ServicesSection />
      <PortfolioCarousel />
      <ClientsSection page="landing" />
    </main>
  );
}
