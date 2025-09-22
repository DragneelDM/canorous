import Hero from "@components/Hero";

export default function VisualStudio() {
  return (
    <main>
      <Hero
        headline="Canorous"
        subbrands={["3D Studio"]}
        subtitle="Crafting 3D environments and assets for visualization and interactive experiences."
        ctaText="See 3D Studio Work"
        ctaLink="#portfolio"
        backgroundType="gradient"
        overlayColor="bg-gray-800/60"
        loop={1}
      />
    </main>
  );
}
