import Hero from "@components/Hero";

export default function VisualStudio() {
  return (
    <main>
      <Hero
        subbrands={["3D Studio"]}
        subtitle="High-quality 3D visualization and modeling."
        ctaText="View Portfolio"
        ctaLink="#portfolio"
        loop={false}
      />
    </main>
  );
}
