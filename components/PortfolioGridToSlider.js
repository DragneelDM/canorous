"use client";

import PortfolioSlider from "./PortfolioSlider";

/**
 * @param {Object} props
 * @param {Array} props.data - Array of { image: string, alt?: string }
 * @param {boolean} [props.auto] - Enable autoplay
 */
export default function PortfolioGridToSlider({ data, auto = true }) {
  // Decide: if images are mostly vertical, use fullScreen
  const tallImages = data.every(item => {
    const [width, height] = (item.size || "1x1").split("x").map(Number); // optional: store size in data
    return height > width;
  });

  return <PortfolioSlider data={data} fullScreen={tallImages} autoplay={auto} />;
}
