"use client";

import { Typewriter } from "react-simple-typewriter";

export default function Hero({
  headline = "Canorous",
  subtitle = "Building worlds, assets, and solutions — from visualization to interactive experiences.",
  ctaText = "Explore Our Work",
  ctaLink = "#portfolio",
  showBackground = true
}) {
  return (
    <section className="relative w-full h-screen bg-gray-900 flex items-center justify-center overflow-hidden">
      
      {/* Optional background animation */}
      {showBackground && (
        <div className="absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 opacity-70 z-0"></div>
      )}

      <div className="relative z-10 text-center px-4">
        {/* Headline */}
        <h1 className="text-5xl md:text-7xl font-extrabold text-white mb-4">
          <Typewriter
            words={[headline]}
            loop={1} // type once
            cursor
            cursorStyle="|"
            typeSpeed={70}
            deleteSpeed={50}
          />
        </h1>

        {/* Subtitle / Mini About */}
        <p className="text-lg md:text-2xl text-gray-300 mb-8">{subtitle}</p>

        {/* CTA */}
        <a
          href={ctaLink}
          className="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition"
        >
          {ctaText}
        </a>
      </div>

      {/* Optional floating circles for visual flair */}
      {showBackground && (
        <div className="absolute top-0 left-0 w-full h-full pointer-events-none">
          <div className="absolute w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply opacity-20 animate-bounce-slow -top-20 -left-32"></div>
          <div className="absolute w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply opacity-20 animate-bounce-slow -bottom-40 -right-40"></div>
        </div>
      )}
    </section>
  );
}
