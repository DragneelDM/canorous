import Hero from "@components/Hero";
import ServicesSection from "@components/ServicesSection";
import PortfolioSlider from "@components/PortfolioSlider";
import ClientsSection from "@components/ClientsSection";
import WhatSetsUsApart from "@components/WhatSetsUsApart"
import projects from "@data/projectsData.json";

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
        backgroundVideo="/videos/CanorousPromo.mp4"
        overlayColor="bg-gray-900/50"
      />

      {/* <PhilosophySection /> */}

      <WhatSetsUsApart />

      <ServicesSection />
      <PortfolioSlider data={projects} fullScreen autoplay />
      <ClientsSection page="landing" />
    </main>
  );
}
