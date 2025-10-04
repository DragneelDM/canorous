import Hero from "@components/Hero";
import BentoGrid, { BentoItem } from "@components/BentoGrid";
import { pageMetadata } from "src/data/metadata";
export const metadata = pageMetadata.studio3d;

const bentoItems: BentoItem[] = [
  {
    image: "/images/3d/hero1.jpg",
    alt: "Archviz hero",
    variant: "large",
    title: "Archviz - Lobby",
  },
  {
    image: "/images/3d/prop1.jpg",
    alt: "Prop 1",
    variant: "small",
  },
  {
    image: "/images/3d/prop2.jpg",
    alt: "Prop 2",
    variant: "vertical",
  },
  {
    image: "/images/3d/scene1.jpg",
    alt: "Scene 1",
    variant: "horizontal",
    title: "Interior Study",
  },
  {
    image: "/images/3d/prop3.jpg",
    alt: "Prop 3",
    variant: "small",
  },
  {
    image: "/images/3d/scene2.jpg",
    alt: "Scene 2",
    variant: "vertical",
  },
  {
    image: "/images/3d/closeup.jpg",
    alt: "Closeup",
    variant: "small",
  },
  {
    image: "/images/3d/scene3.jpg",
    alt: "Scene 3",
    variant: "horizontal",
  },
];



export default function VisualStudio() {
  return (
    <main>
      <Hero
        headline="Canorous"
        subbrands={["3D Studio"]}
        subtitle="Crafting 3D environments and assets for visualization and interactive experiences."
        ctaText="See 3D Studio Work"
        ctaLink="#portfolio"
        backgroundType="video"
        backgroundVideo="/videos/Outdoor-Clip.mp4"
        overlayColor="bg-gray-800/60"
        loop={1}
      />
      <BentoGrid items={bentoItems} />
    </main>
  );
}
