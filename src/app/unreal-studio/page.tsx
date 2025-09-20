import Hero from "@components/Hero";

export default function UnrealStudio() {
  return (
    <main>
      <Hero
        subbrands={["Unreal Studio"]}
        subtitle="Explore our Unreal Engine projects: archviz, configurators, and interactive VR experiences."
        ctaText="View Projects"
        ctaLink="#portfolio"
        loop={false}
      />
    </main>
  );
}
