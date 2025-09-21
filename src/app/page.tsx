import Hero from "@components/Hero";

export default function Home() {
  return (
    <main>
      <Hero
        headline="Canorous"
        subbrands={["Arch Viz", "Configurable Products", "VR Experiences"]}
        subtitle="Building interactive worlds and experiences in Unreal Engine."
        ctaText="Explore Unreal Projects"
        ctaLink="#portfolio"
        backgroundType="video"
        backgroundVideo="/videos/unreal-demo.mp4"
        overlayColor="bg-gray-900/50"
      />
    </main>
  );
}
