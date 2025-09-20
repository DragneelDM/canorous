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
  loop = false, // typewriter loop
  backgroundType = "gradient", // "gradient" | "video" | "image"
  backgroundVideo = "", // URL if using video
  backgroundImage = "", // URL if using image
  overlayColor = "bg-gray-900/70", // tailwind overlay color
  floatingShapes = true
}) {
  const [playOnce, setPlayOnce] = useState(false);

  useEffect(() => {
    setPlayOnce(true);
  }, []);

  return (
    <section className="relative w-full h-screen flex items-center justify-center overflow-hidden">
      {/* Background */}
      {showBackground && (
        <>
          {backgroundType === "gradient" && (
            <div className={`absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 ${overlayColor} z-0`}></div>
          )}
          {backgroundType === "video" && backgroundVideo && (
            <video
              autoPlay
              muted
              loop
              className="absolute inset-0 w-full h-full object-cover z-0"
            >
              <source src={backgroundVideo} type="video/mp4" />
            </video>
          )}
          {backgroundType === "image" && backgroundImage && (
            <div
              className="absolute inset-0 w-full h-full bg-center bg-cover z-0"
              style={{ backgroundImage: `url(${backgroundImage})` }}
            ></div>
          )}
        </>
      )}

      {/* Floating shapes */}
      {floatingShapes && showBackground && (
        <div className="absolute top-0 left-0 w-full h-full pointer-events-none">
          <div className="absolute w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply opacity-20 animate-bounce-slow -top-20 -left-32"></div>
          <div className="absolute w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply opacity-20 animate-bounce-slow -bottom-40 -right-40"></div>
        </div>
      )}

      {/* Content */}
      <div className="relative z-10 text-center px-4">
        <h1 className="text-5xl md:text-7xl font-extrabold text-white mb-4">
          {headline}{" "}
          <span className="text-blue-400">
            {playOnce && (
              <Typewriter
                words={subbrands}
                loop={loop ? 0 : 1}
                cursor
                cursorStyle="|"
                typeSpeed={70}
                deleteSpeed={90}
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
