// components/PortfolioGrid.js
"use client";

export default function PortfolioGrid({ data }) {
  return (
    <div className="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
      {data.map((item, index) => (
        <div
          key={index}
          className="bg-gray-800 rounded-lg overflow-hidden shadow hover:shadow-lg transition"
        >
          <div className="w-full aspect-[4/3] overflow">
            <img
              src={item.image}
              alt=""
              className="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
            />
          </div>
        </div>
      ))}
    </div>
  );
}
