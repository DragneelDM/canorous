"use client";

import { motion } from "framer-motion";

const philosophies = [
  {
    title: "Engineering",
    desc: "We approach every project with engineering rigor, solving problems end-to-end. From conceptual design to virtual/physical validation, we provide a comprehensive engineering package.",
    image: "/images/philosophy/engineering.png",
    color: "border-blue-500",
  },
  {
    title: "Virtual Reality",
    desc: "Creating immersive experiences that let users step into your vision. Leveraging cutting-edge tech, we help streamline processes and enhance productivity.",
    image: "/images/philosophy/vr.png",
    color: "border-purple-500",
  },
  {
    title: "Gaming",
    desc: "Our love for interactive entertainment drives creativity in every project. With a versatile portfolio, we are an emerging player in the global landscape.",
    image: "/images/philosophy/gaming.png",
    color: "border-pink-500",
  },
];

export default function PhilosophySection() {
  return (
    <section className="py-20 bg-gray-800 text-white">
      <div className="max-w-6xl mx-auto px-6 text-center mb-12">
        <h2 className="text-3xl md:text-4xl font-bold">Our Philosophy</h2>
        <p className="text-gray-300 mt-4 text-lg md:text-xl">
          At Canorous, we don’t just solve problems — we engineer possibilities.
        </p>
      </div>

      <div className="grid sm:grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
        {philosophies.map((item, index) => (
          <motion.div
            key={index}
            className={`bg-gray-900 rounded-xl p-6 shadow hover:shadow-xl transition flex flex-col items-center border-t-4 ${item.color} hover:scale-105`}
            initial={{ opacity: 0, y: 30 }}
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
    </section>
  );
}
