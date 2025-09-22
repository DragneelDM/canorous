import Hero from "@components/Hero";
import MediaTextSection from "@components/MediaTextSection";

export default function UnrealStudio() {
  return (
    <main>
      <Hero
        headline="Canorous"
        subbrands={["Unreal tudio"]}
        subtitle="Building interactive worlds and experiences in Unreal Engine."
        ctaText="Explore Unreal Projects"
        ctaLink="#portfolio"
        backgroundType="video"
        backgroundVideo="/videos/unreal-demo.mp4"
        overlayColor="bg-gray-900/50"
        loop={1}
      />
      <MediaTextSection
        mediaType="video"
        mediaSrc="/videos/unreal-demo.mp4"
        heading="Immersive Unreal Experiences"
        description="We build high-fidelity visualization and interactive worlds for architects and designers."
      />

      <MediaTextSection
        mediaType="image"
        mediaSrc="/images/manufacturing/item1.jpg"
        heading="Turnkey Manufacturing"
        description="From prototyping to global trading, we provide end-to-end manufacturing solutions."
        reverse={true}
      />
    </main>



  );
}
