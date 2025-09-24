"use client";

export default function VideoTextGrid({ items }) {
  return (
    <section className="bg-gray-900 py-20 text-white">
      <div className="max-w-6xl mx-auto space-y-24 px-6">
        {items.map((item, index) => {
          const isReversed = index % 2 === 1; // alternate layout

          return (
            <div
              key={index}
              className={`flex flex-col lg:flex-row items-center gap-12 ${
                isReversed ? "lg:flex-row-reverse" : ""
              }`}
            >
              {/* Media: video or custom content */}
              <div className="flex-1 w-full">
                {item.customContent ? (
                  <div className="w-full rounded-lg shadow-lg">
                    {item.customContent}
                  </div>
                ) : (
                  <video
                    src={item.video}
                    autoPlay
                    loop
                    muted
                    playsInline
                    className="w-full rounded-lg shadow-lg"
                  />
                )}
              </div>

              {/* Text */}
              <div className="flex-1">
                <h3 className="text-3xl font-bold mb-4">{item.title}</h3>
                <p className="text-gray-300 text-lg">{item.description}</p>
              </div>
            </div>
          );
        })}
      </div>
    </section>
  );
}
