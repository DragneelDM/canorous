"use client";

import Hero from "@components/Hero";
import VideoTextGrid from "@components/VideoTextGrid";
import { Unreal } from "@components/UnrealPin";
import { UnrealPin2 } from "@components/UnrealPin2";
import { UnrealPin3 } from "@components/UnrealPin3";


const unrealItems = [
  {
    title: "Virtual Reality Experiences",
    description:
      "Step into your projects before they’re built with immersive VR walkthroughs that give clients and stakeholders a true sense of scale and space.",
    customContent: <Unreal />,
  },
  {
    title: "Interactive Configurators",
    description:
      "Explore design options in real-time. Our configurators let users customize products, interiors, and environments seamlessly.",
    customContent: <UnrealPin2 />,
  },
  {
    title: "Gaming Applications",
    description:
      "From interactive mechanics to visually striking worlds, our Unreal expertise extends to creating engaging gaming experiences.",
    customContent: <UnrealPin3 />,
  },
];


export default function UnrealPage() {
  return (
    <main>
      <Hero
        headline="Canorous"
        subbrands={["Unreal Studio"]}
        subtitle="Immersive, interactive experiences powered by Unreal Engine."
        ctaText="Explore Projects"
        ctaLink="#portfolio"
        backgroundType="video"
        backgroundVideo="/videos/Gameplay.mp4"
        overlayColor="bg-gray-900/50"
        loop={1}
      />

      <VideoTextGrid items={unrealItems} />
    </main>
  );
}
