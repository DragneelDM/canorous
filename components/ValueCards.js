"use client";

import { motion } from "framer-motion";

const values = [
  {
    title: "Unreal Studio",
    desc: "High-fidelity visualization and interactive solutions powered by Unreal Engine.",
  },
  {
    title: "3D Studio",
    desc: "Creative 3D asset production, modeling, and visualization pipelines.",
  },
  {
    title: "Engineering",
    desc: "CAD design, technical documentation, and turnkey engineering solutions.",
  },
  {
    title: "Manufacturing",
    desc: "Turnkey manufacturing services and global trading capabilities.",
  },
];

export default function ValueCards() {
  return (
    <section className="py-20 bg-gray-900 text-white">
      <div className="max-w-6xl mx-auto px-6">
        <h2 className="text-3xl md:text-4xl font-bold text-center mb-12">
          End-to-End Solutions
        </h2>
        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
          {values.map((item, index) => (
            <motion.div
              key={index}
              className="bg-gray-800 rounded-xl p-6 shadow hover:shadow-xl transition"
              initial={{ opacity: 0, y: 40 }}
              whileInView={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.6, delay: index * 0.2 }}
              viewport={{ once: true }}
            >
              <h3 className="text-xl font-semibold mb-3">{item.title}</h3>
              <p className="text-gray-300 text-sm">{item.desc}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
