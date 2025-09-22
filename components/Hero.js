"use client";

import { Typewriter } from "react-simple-typewriter";
import { useState, useEffect, useRef } from "react";

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
}) {
  const [playOnce, setPlayOnce] = useState(false);
  const [offsetY, setOffsetY] = useState(0);
  const contentRef = useRef(null);
  const [revealed, setRevealed] = useState(false);

  // Trigger typewriter on first render
  useEffect(() => {
    setPlayOnce(true);
  }, []);

  // Parallax scroll + reveal content
  useEffect(() => {
    const handleScroll = () => {
      setOffsetY(window.scrollY);
      if (contentRef.current) {
        const top = contentRef.current.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        if (top < windowHeight * 0.85) setRevealed(true);
      }
    };
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <section className="relative w-full h-screen flex items-center justify-center overflow-hidden">
      
      {/* Background */}
      {showBackground && backgroundType === "gradient" && (
        <div
          className={`absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 ${overlayColor}`}
          style={{ transform: `translateY(${offsetY * 0.3}px)` }}
        ></div>
      )}

      {showBackground && backgroundType === "video" && backgroundVideo && (
        <video
          autoPlay
          muted
          loop
          playsInline
          className="absolute inset-0 w-full h-full object-cover"
          style={{ transform: `translateY(${offsetY * 0.3}px)` }}
        >
          <source src={backgroundVideo} type="video/mp4" />
        </video>
      )}

      {/* Overlay */}
      {showBackground && <div className={`absolute inset-0 ${overlayColor}`}></div>}

      {/* Hero Content */}
      <div
        ref={contentRef}
        className={`relative z-20 text-center px-4 transition-all duration-700 ease-out ${
          revealed ? "opacity-100 translate-y-0" : "opacity-0 translate-y-10"
        }`}
      >
        <h1 className="text-5xl md:text-7xl font-extrabold text-white mb-4">
          {headline}{" "}
          <span className="text-blue-400">
            {playOnce && (
              <Typewriter
                words={subbrands}
                loop={1}
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

      {/* Floating Shapes */}
      {showBackground && (
        <>
          <div
            className={`absolute w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply opacity-0 animate-bounce-slow -top-20 -left-32 transition-all duration-800 ease-out ${
              revealed ? "opacity-20 translate-y-0" : "translate-y-6"
            }`}
            style={{ transform: `translateY(${offsetY * 0.2}px)` }}
          ></div>

          <div
            className={`absolute w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply opacity-0 animate-bounce-slow -bottom-40 -right-40 transition-all duration-900 ease-out ${
              revealed ? "opacity-20 translate-y-0" : "translate-y-6"
            }`}
            style={{ transform: `translateY(${offsetY * 0.25}px)` }}
          ></div>
        </>
      )}
    </section>
  );
}
