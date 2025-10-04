"use client";
import React from "react";

export type BentoItem = {
  image: string;
  alt?: string;
  variant?: "large" | "vertical" | "horizontal" | "small";
  title?: string;
};

interface BentoGridProps {
  items: BentoItem[];
}

export default function BentoGrid({ items }: BentoGridProps) {
  const variantToClass: Record<
    NonNullable<BentoItem["variant"]>,
    string
  > = {
    large: "md:col-span-2 md:row-span-2",
    vertical: "md:col-span-1 md:row-span-2",
    horizontal: "md:col-span-2 md:row-span-1",
    small: "md:col-span-1 md:row-span-1",
  };

  return (
    <section className="py-12">
      <div className="max-w-6xl mx-auto px-4">
        <div className="grid grid-cols-1 gap-4 md:grid-cols-4 md:auto-rows-[12rem]">
          {items.map((it, i) => {
            const variant = it.variant || "small";
            const spans = variantToClass[variant];

            return (
              <div
                key={i}
                className={`relative overflow-hidden rounded-lg bg-gray-800 shadow-lg ${spans}`}
              >
                <img
                  src={it.image}
                  alt={it.alt || `portfolio-${i}`}
                  loading="lazy"
                  className="w-full h-full object-cover transform transition-transform duration-400 hover:scale-105"
                />
                {it.title && (
                  <div className="absolute inset-0 flex items-end p-4">
                    <div className="bg-black/40 backdrop-blur-sm text-white px-3 py-2 rounded">
                      <h4 className="text-sm font-semibold">{it.title}</h4>
                    </div>
                  </div>
                )}
              </div>
            );
          })}
        </div>
      </div>
    </section>
  );
}
