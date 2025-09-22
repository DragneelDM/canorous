"use client";

import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

/**
 * @param {Object} props
 * @param {Array} props.data - Array of { image: string, alt?: string }
 * @param {boolean} [props.fullScreen] - Use full height (80vh) or fixed height (500px)
 * @param {boolean} [props.autoplay] - Enable autoplay
 */
export default function PortfolioSlider({ data, fullScreen = false, autoplay = false }) {
  return (
    <div className="w-full max-w-6xl mx-auto py-12">
      <Swiper
        modules={[Navigation, Pagination, Autoplay]}
        navigation
        pagination={{ clickable: true }}
        autoplay={autoplay ? { delay: 3000 } : false}
        spaceBetween={30}
        slidesPerView={1}
        loop
        className="rounded-lg overflow-hidden"
      >
        {data.map((item, index) => (
          <SwiperSlide key={index}>
            <div className={`w-full ${fullScreen ? "h-[80vh]" : "h-[500px]"} overflow-hidden rounded-lg`}>
              <img
                src={item.image}
                alt={item.alt || ""}
                className={`w-full h-full ${fullScreen ? "object-contain" : "object-cover"}`}
              />
            </div>
          </SwiperSlide>
        ))}
      </Swiper>
    </div>
  );
}
