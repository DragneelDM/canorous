import Hero from "@components/Hero";

export default function Home() {
  return (
    <main>
      <Hero
        headline="Canorous"
        subtitle="We craft worlds, assets, and solutions across engineering, 3D, Unreal, and manufacturing."
        ctaText="See Our Sub-Brands"
        ctaLink="#subbrands"
        loop={true}
      />
    </main>
  );
}
