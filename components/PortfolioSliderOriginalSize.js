"use client";

import { useState } from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

export default function PortfolioSliderOriginalSize({ data, autoplay = true }) {
  const [activeItem, setActiveItem] = useState(null);

  return (
    <>
      <div className="w-full max-w-6xl mx-auto py-12">
        <Swiper
          modules={[Navigation, Pagination, Autoplay]}
          navigation
          pagination={{ clickable: true }}
          autoplay={autoplay ? { delay: 3000 } : false}
          spaceBetween={30}
          slidesPerView={3}
          loop
          className="rounded-lg overflow-visible"
          breakpoints={{
            320: { slidesPerView: 1 },
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
          }}
        >
          {data.map((item, index) => (
            <SwiperSlide key={index} className="flex justify-center">
              <button
                type="button"
                className="w-full text-left"
                onClick={() => setActiveItem(item)}
              >
                <div className="relative w-full overflow-hidden rounded-2xl border border-white/10 bg-gray-900/50 aspect-[4/3]">
                  <img
                    src={item.image}
                    alt={item.alt || item.title || ""}
                    className="h-full w-full object-cover object-center transition-transform duration-700 hover:scale-105"
                  />
                </div>
              </button>
            </SwiperSlide>
          ))}
        </Swiper>
      </div>

      {activeItem && (
        <div
          className="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-6 backdrop-blur"
          onClick={() => setActiveItem(null)}
        >
          <div
            className="relative max-w-5xl w-full lg:w-4/5 xl:w-3/5"
            onClick={(e) => e.stopPropagation()}
          >
            <button
              type="button"
              className="absolute right-4 top-4 text-white/80 hover:text-white text-4xl"
              onClick={() => setActiveItem(null)}
              aria-label="Close fullscreen preview"
            >
              &times;
            </button>
            <div className="relative w-full overflow-hidden rounded-3xl border border-white/20 bg-black aspect-video md:aspect-[4/3]">
              <img
                src={activeItem.image}
                alt={activeItem.alt || activeItem.title || ""}
                className="h-full w-full object-contain"
              />
            </div>
          </div>
        </div>
      )}
    </>
  );
}
