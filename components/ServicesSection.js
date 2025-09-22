"use client";

import { motion } from "framer-motion";

const services = [
  {
    title: "Engineering",
    desc: "CAD design, technical documentation, and turnkey engineering solutions.",
    image: "/images/services/engineering.png",
    color: "border-blue-500",
  },
  {
    title: "Virtual Reality",
    desc: "High-fidelity architectural visualization and interactive VR solutions.",
    image: "/images/services/vr.png",
    color: "border-purple-500",
  },
  {
    title: "Gaming",
    desc: "Creative 3D asset production and pipelines for immersive games.",
    image: "/images/services/gaming.png",
    color: "border-pink-500",
  },
  {
    title: "Manufacturing",
    desc: "Turnkey manufacturing services, prototyping, and global delivery.",
    image: "/images/services/manufacturing.png",
    color: "border-yellow-500",
  },
];

export default function ServicesSection() {
  return (
    <section className="py-20 bg-gray-900 text-white">
      <div className="max-w-6xl mx-auto px-6">
        <h2 className="text-3xl md:text-4xl font-bold text-center mb-12">End-to-End Solutions</h2>
        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
          {services.map((item, index) => (
            <motion.div
              key={index}
              className={`bg-gray-800 rounded-xl p-6 shadow hover:shadow-xl transition flex flex-col items-center border-t-4 ${item.color} hover:scale-105`}
              initial={{ opacity: 0, y: 40 }}
              whileInView={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.6, delay: index * 0.2 }}
              viewport={{ once: true }}
            >
              <img src={item.image} alt={item.title} className="h-20 mb-4 object-contain" />
              <h3 className="text-xl font-semibold mb-3">{item.title}</h3>
              <p className="text-gray-300 text-sm text-center">{item.desc}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
