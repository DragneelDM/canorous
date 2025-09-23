"use client";
import React from "react";
import { StickyScroll } from "@components/StickyScrollReveal";

const unrealContent = [
  {
    title: "Virtual Reality Experiences",
    description:
      "Step into your projects before they’re built. Our VR walkthroughs give clients and stakeholders an immersive experience of architectural and design spaces.",
    content: (
      <video
        src="/videos/unreal-vr.mp4"
        autoPlay
        loop
        muted
        playsInline
        className="h-full w-full object-cover"
      />
    ),
  },
  {
    title: "Interactive Configurators",
    description:
      "Explore options in real-time. Our Unreal configurators let users customize products, interiors, and environments with seamless interactivity.",
    content: (
      <video
        src="/videos/unreal-configurator.mp4"
        autoPlay
        loop
        muted
        playsInline
        className="h-full w-full object-cover"
      />
    ),
  },
  {
    title: "Gaming Applications",
    description:
      "Our Unreal expertise extends to gaming. From immersive mechanics to visually striking worlds, we build interactive experiences that engage and inspire.",
    content: (
      <video
        src="/videos/unreal-gaming.mp4"
        autoPlay
        loop
        muted
        playsInline
        className="h-full w-full object-cover"
      />
    ),
  },
];

export function StickyScrollRevealUnreal() {
  return (
    <div className="">
      <StickyScroll content={unrealContent} />
    </div>
  );
}
