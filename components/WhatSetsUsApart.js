"use client";

import { motion } from "framer-motion";

const points = [
  {
    title: "Customer-Centric Approach",
    desc: "We work closely with our clients to deeply understand their challenges and develop customized solutions.",
  },
  {
    title: "End-to-End Engineering Solutions",
    desc: "From conceptual design and manufacturing to virtual/physical validation, we provide a comprehensive engineering package or modular services based on client requirements.",
  },
  {
    title: "Process Optimization & Efficiency Enhancement",
    desc: "Leveraging cutting-edge technology, we help businesses streamline processes, enhance productivity, and drive innovation.",
  },
  {
    title: "Emerging Industry Leader",
    desc: "With a versatile portfolio and commitment to excellence, we are an emerging player in the global engineering landscape.",
  },
];

export default function WhatSetsUsApart() {
  return (
    <section className="py-20 bg-gray-950 text-white">
      <div className="max-w-6xl mx-auto px-6">
        <h2 className="text-3xl md:text-4xl font-bold text-center mb-12">
          What Sets Us Apart
        </h2>

        <div className="grid md:grid-cols-2 gap-8">
          {points.map((point, idx) => (
            <motion.div
              key={idx}
              className="bg-gray-800 rounded-xl p-6 shadow hover:shadow-xl transition"
              initial={{ opacity: 0, y: 40 }}
              whileInView={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.6, delay: idx * 0.2 }}
              viewport={{ once: true }}
            >
              <h3 className="text-xl font-semibold mb-3">{point.title}</h3>
              <p className="text-gray-300 text-sm">{point.desc}</p>
            </motion.div>
          ))}
        </div>

        <motion.p
          className="mt-12 text-center text-gray-300 text-lg md:text-xl"
          initial={{ opacity: 0 }}
          whileInView={{ opacity: 1 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
        >
          At Canorous, we don&apos;t just solve problems—we engineer possibilities. Whether you&apos;re looking for design, prototyping, manufacturing, or process optimization, we are your trusted partner for shaping the future of engineering.
        </motion.p>
      </div>
    </section>
  );
}
