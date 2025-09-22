"use client";

import { Typewriter } from "react-simple-typewriter";
import { useState, useEffect } from "react";

export default function Hero({
  headline = "Canorous",
  subbrands = ["Unreal Studio", "3D Studio", "Engineering", "Manufacturing"],
  subtitle = "Building worlds, assets, and solutions — from visualization to interactive experiences.",
  ctaText = "Explore Our Work",
  ctaLink = "#portfolio",
  showBackground = true,
  backgroundType = "gradient", // "gradient" | "video"
  backgroundVideo = "",        // if using video
  overlayColor = "bg-gray-900/70",
  loop = 0,                    // 🔹 default 0 = infinite loop
  cursor = true,               // 🔹 toggle cursor
}) {
  const [playOnce, setPlayOnce] = useState(false);

  // Trigger typewriter once component is ready
  useEffect(() => {
    setPlayOnce(true);
  }, []);

  return (
    <section className="relative w-full h-screen flex items-center justify-center overflow-hidden">
      {/* Background */}
      {showBackground && backgroundType === "gradient" && (
        <div
          className={`absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 ${overlayColor}`}
        ></div>
      )}

      {showBackground && backgroundType === "video" && backgroundVideo && (
        <video
          autoPlay
          muted
          loop
          playsInline
          className="absolute inset-0 w-full h-full object-cover"
        >
          <source src={backgroundVideo} type="video/mp4" />
        </video>
      )}

      {showBackground && <div className={`absolute inset-0 ${overlayColor}`}></div>}

      {/* Hero Content */}
      <div className="relative z-20 text-center px-4">
        <h1 className="text-5xl md:text-7xl font-extrabold text-white mb-4">
          {headline}{" "}
          <span className="text-blue-400">
            {playOnce && (
              <Typewriter
                words={subbrands}
                loop={loop}          // 🔹 you control looping
                cursor={cursor}      // 🔹 you control cursor
                cursorStyle="|"
                typeSpeed={70}
                deleteSpeed={50}
              />
            )}
          </span>
        </h1>

        <p className="text-lg md:text-2xl text-gray-300 mb-8">{subtitle}</p>

        <a
          href={ctaLink}
          className="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition"
        >
          {ctaText}
        </a>
      </div>
    </section>
  );
}
