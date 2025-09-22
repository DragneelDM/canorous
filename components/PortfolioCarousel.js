"use client";

import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

const projects = [
  { image: "/images/unreal/archviz1.jpg", alt: "Archviz Project 1" },
  { image: "/images/unreal/archviz2.jpg", alt: "Archviz Project 2" },
  { image: "/images/3d/prop1.jpg", alt: "3D Prop 1" },
  { image: "/images/engineering/cad1.jpg", alt: "CAD Project 1" },
  { image: "/images/manufacturing/item1.jpg", alt: "Manufactured Item 1" },
];

export default function PortfolioCarousel() {
  return (
    <section id="portfolio" className="py-20 bg-gray-950 text-white">
      <div className="max-w-6xl mx-auto px-6">
        <h2 className="text-3xl md:text-4xl font-bold text-center mb-12">
          Portfolio Showcase
        </h2>

        <Swiper
          modules={[Navigation, Pagination, Autoplay]}
          spaceBetween={30}
          slidesPerView={1}
          navigation
          pagination={{ clickable: true }}
          autoplay={{ delay: 3000 }}
          loop={true}
          className="rounded-lg overflow-hidden"
        >
          {projects.map((item, index) => (
            <SwiperSlide key={index}>
              <img
                src={item.image}
                alt={item.alt}
                className="w-full h-[500px] object-cover rounded-lg"
              />
            </SwiperSlide>
          ))}
        </Swiper>
      </div>
    </section>
  );
}
