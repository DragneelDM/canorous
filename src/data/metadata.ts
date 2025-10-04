// src/data/metadata.ts
import type { Metadata } from "next";

export const defaultMetadata: Metadata = {
  title: "Canorous | Engineering, Manufacturing, 3D Visualization, and Unreal Studio",
  description:
    "Canorous delivers end-to-end engineering, turnkey manufacturing, 3D visualization, and Unreal Studio VR/AR solutions for industries worldwide.",
  keywords: [
    "MEP engineering",
    "turnkey manufacturing",
    "Unreal Engine",
    "VR/AR",
    "3D visualization",
    "product design",
    "engineering solutions",
    "Canorous",
  ],
  icons: {
    icon: [
      { url: "/icons/CTL_Icon_512.png", sizes: "32x32", type: "image/png" },
      { url: "/icons/CTL_Icon_512.png", sizes: "16x16", type: "image/png" },
    ],
  },
  openGraph: {
    title: "Canorous Technologies",
    description:
      "End-to-end engineering, manufacturing, and 3D visualization solutions.",
    url: "https://canorous.com",
    siteName: "Canorous",
    images: [
      {
        url: "/images/og-image.jpg", // create a nice montage for sharing
        width: 1200,
        height: 630,
        alt: "Canorous preview image",
      },
    ],
    locale: "en_US",
    type: "website",
  },
};

export const pageMetadata = {
  engineering: {
    title: "Canorous Engineering | CAD, MEP & Technical Documentation",
    description:
      "We provide CAD modeling, simulation, technical documentation, and end-to-end MEP engineering solutions.",
  },
  manufacturing: {
    title: "Canorous Manufacturing | Turnkey Solutions & Global Trading",
    description:
      "From design and prototyping to production and delivery — Canorous delivers full turnkey manufacturing solutions and industrial trading.",
  },
  studio3d: {
    title: "Canorous 3D Studio | Modeling & Visualization",
    description:
      "High-quality 3D modeling, visualization, and asset creation for architecture, design, and interactive experiences.",
  },
  unreal: {
    title: "Canorous Unreal Studio | VR/AR & Configurators",
    description:
      "Immersive VR/AR experiences, configurators, and interactive solutions powered by Unreal Engine.",
  },
};
