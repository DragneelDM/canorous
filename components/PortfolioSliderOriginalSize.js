"use client";

import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

export default function PortfolioSliderOriginalSize({ data, autoplay = true }) {
  console.log("engineeringData:", data);
  return (
    <div className="w-full max-w-6xl mx-auto py-12">
      <Swiper
        modules={[Navigation, Pagination, Autoplay]}
        navigation
        pagination={{ clickable: true }}
        autoplay={autoplay ? { delay: 3000 } : false}
        spaceBetween={30}
        slidesPerView={3}      // <-- 3 slides at a time
        loop
        className="rounded-lg overflow-visible"
        breakpoints={{
          320: { slidesPerView: 1 },   // mobile
          640: { slidesPerView: 2 },   // small screens
          1024: { slidesPerView: 3 },  // desktop
        }}
      >
        {data.map((item, index) => (
          <SwiperSlide key={index} className="flex justify-center">
            <img
              src={item.image}
              alt={item.alt || ""}
              className="max-w-full h-auto"
            />
          </SwiperSlide>
        ))}
      </Swiper>
    </div>
  );
}
