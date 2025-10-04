/** @type {import('next').NextConfig} */
const nextConfig = {
  output: "export", // ✅ this replaces `next export`
  images: {
    unoptimized: true, // required if you use next/image in static exports
  },
  trailingSlash: true,
};

module.exports = nextConfig;
