"use client";

import { motion } from "framer-motion";

/**
 * @param {Object} props
 * @param {string} [props.mediaType="video"] - "video" or "image"
 * @param {string} props.mediaSrc - URL of the video or image
 * @param {string} props.heading - Heading text
 * @param {string} props.description - Description text
 * @param {boolean} [props.reverse=false] - Whether media is on right or left
 */
export default function MediaTextSection({
  mediaType = "video",
  mediaSrc,
  heading,
  description,
  reverse = false,
}) {
  return (
    <section className="py-16 bg-gray-900 text-white">
      <div className={`max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center ${reverse ? 'md:flex-row-reverse' : ''} gap-8`}>
        
        {/* Media */}
        <motion.div
          className="md:w-1/2 w-full overflow-hidden rounded-lg shadow-lg"
          initial={{ opacity: 0, x: reverse ? 100 : -100 }}
          whileInView={{ opacity: 1, x: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
        >
          {mediaType === "video" ? (
            <video
              src={mediaSrc}
              autoPlay
              loop
              muted
              playsInline
              className="w-full h-full object-cover rounded-lg"
            />
          ) : (
            <img
              src={mediaSrc}
              alt={heading}
              className="w-full h-full object-cover rounded-lg"
            />
          )}
        </motion.div>

        {/* Text */}
        <motion.div
          className="md:w-1/2 w-full text-center md:text-left"
          initial={{ opacity: 0, x: reverse ? -100 : 100 }}
          whileInView={{ opacity: 1, x: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
        >
          <h3 className="text-3xl font-bold mb-4">{heading}</h3>
          <p className="text-gray-300">{description}</p>
        </motion.div>
      </div>
    </section>
  );
}
