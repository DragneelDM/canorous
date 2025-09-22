export default function PortfolioGrid({ data }) {
  return (
    <div className="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
      {data.map((item, index) => (
        <div
          key={index}
          className="bg-gray-800 rounded-lg overflow-hidden shadow hover:shadow-lg transition"
        >
          <img
            src={item.image}
            alt=""
            className="w-full h-56 object-cover hover:scale-105 transition-transform duration-300"
          />
        </div>
      ))}
    </div>
  );
}