import Hero from "@components/Hero";

export default function Home() {
  return (
    <main>
      <Hero
        headline="Canorous"
        subtitle="We craft worlds, assets, and solutions across engineering, architecture, gaming and manufacturing."
        ctaText="Find your end to end Solution"
        ctaLink="#subbrands"
        loop={true}
      />
    </main>
  );
}
