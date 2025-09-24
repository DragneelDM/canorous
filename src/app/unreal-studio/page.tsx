import Hero from "@components/Hero";
import { StickyScrollRevealUnreal } from "@components/StickyScrollRevealUnreal";

const unrealTextBlocks = [
  {
    title: "High-Fidelity Visuals",
    desc: "Unreal Engine enables us to create photorealistic architectural visualizations.",
  },
  {
    title: "Interactive Configurators",
    desc: "Clients can explore options in real-time with immersive 3D configurators.",
  },
  {
    title: "Virtual Reality Experiences",
    desc: "Step into your vision before it’s built with VR walkthroughs and demos.",
  },
  {
    title: "End-to-End Solutions",
    desc: "From 3D assets to full VR environments, we handle everything in-house.",
  },
];

export default function UnrealStudio() {
  return (
    <main>
      <Hero
        headline="Canorous"
        subbrands={["Unreal Studio"]}
        subtitle="Building interactive worlds and experiences in Unreal Engine."
        ctaText="Explore Unreal Projects"
        ctaLink="#portfolio"
        backgroundType="video"
        backgroundVideo="/videos/unreal-demo.mp4"
        overlayColor="bg-gray-900/50"
        loop={1}
      />

      {/* Sticky Scroll Section */}
      <section className="w-full bg-gray-900 py-20 mt-5">
        <div className="max-w-7xl mx-auto">
          {/* Optional Section Heading */}
          <StickyScrollRevealUnreal />
        </div>
      </section>
    </main>



  );
}
