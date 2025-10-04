import { useState, useEffect, useRef } from "react";
import { Typewriter } from "react-simple-typewriter";


export default function Hero({ ...props }) {
  const [isVisible, setIsVisible] = useState(false);
  const contentRef = useRef(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => setIsVisible(entry.isIntersecting),
      { threshold: 0.2 } // triggers when 20% visible
    );
    if (contentRef.current) observer.observe(contentRef.current);
    return () => observer.disconnect();
  }, []);

  return (
    <section className="relative w-full h-screen ...">
      {/* Background / shapes here */}

      <div
        ref={contentRef}
        className={`relative z-20 text-center px-4 transition-all duration-700 ease-out ${
          isVisible ? "opacity-100 translate-y-0" : "opacity-0 translate-y-8"
        }`}
      >
        {/* Headline + Typewriter */}
        <h1 className="text-5xl md:text-7xl font-extrabold text-white mb-4">
          {headline}{" "}
          <span className="text-blue-400">
            {playOnce && <Typewriter words={subbrands} loop={1} />}
          </span>
        </h1>

        {/* Subtitle */}
        <p className="text-lg md:text-2xl text-gray-300 mb-8">{subtitle}</p>

        {/* CTA */}
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
