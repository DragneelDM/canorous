"use client";
import React, { useEffect, useRef, useState } from "react";
import { useMotionValueEvent, useScroll } from "motion/react";
import { motion } from "motion/react";
import { cn } from "src/lib/utils";

export const StickyScroll = ({ content, contentClassName }) => {
  const [activeCard, setActiveCard] = useState(0);
  const ref = useRef(null);
  const { scrollYProgress } = useScroll({
    target: ref, // ✅ stick to page scroll, not container
    offset: ["start start", "end start"],
  });
  const cardLength = content.length;

  useMotionValueEvent(scrollYProgress, "change", (latest) => {
    const cardsBreakpoints = content.map((_, index) => index / cardLength);
    const closestBreakpointIndex = cardsBreakpoints.reduce((acc, breakpoint, index) => {
      const distance = Math.abs(latest - breakpoint);
      if (distance < Math.abs(latest - cardsBreakpoints[acc])) {
        return index;
      }
      return acc;
    }, 0);
    setActiveCard(closestBreakpointIndex);
  });

  const backgroundColors = ["#0f172a", "#000000", "#171717"];
  const linearGradients = [
    "linear-gradient(to bottom right, #06b6d4, #10b981)",
    "linear-gradient(to bottom right, #ec4899, #6366f1)",
    "linear-gradient(to bottom right, #f97316, #eab308)",
  ];
  const [backgroundGradient, setBackgroundGradient] = useState(linearGradients[0]);

  useEffect(() => {
    setBackgroundGradient(linearGradients[activeCard % linearGradients.length]);
  }, [activeCard]);

  return (
    <motion.div
      animate={{ backgroundColor: backgroundColors[activeCard % backgroundColors.length] }}
      ref={ref}
      className="relative flex justify-around space-x-10 rounded-md p-10"
    >
      {/* Left side: Scrolling text */}
      <div className="flex-1">
        <div className="max-w-2xl mx-auto">
          {content.map((item, index) => (
            <div
              key={item.title + index}
              className="min-h-screen flex flex-col justify-center"
            >
              <motion.h2
                animate={{ opacity: activeCard === index ? 1 : 0.3 }}
                className="text-4xl font-bold text-slate-100"
              >
                {item.title}
              </motion.h2>
              <motion.p
                animate={{ opacity: activeCard === index ? 1 : 0.3 }}
                className="mt-6 max-w-md text-lg text-gray-300"
              >
                {item.description}
              </motion.p>
            </div>
          ))}

          {/* Spacer so last card gets full viewport */}
          <div className="h-screen" />
        </div>


      </div>

      {/* Right side: Sticky content */}
      <div
        style={{ background: backgroundGradient }}
        className={cn(
          "sticky top-1/2 -translate-y-1/2 hidden h-[400px] w-[500px] overflow-hidden rounded-md bg-white lg:block",
          contentClassName
        )}
      >
        {content[activeCard].content ?? null}
      </div>

    </motion.div>
  );
};
