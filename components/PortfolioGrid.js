export default function PortfolioGrid({ data }) {
  return (
    <div className="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
      {data.map((item, index) => (
        <div key={index} className="bg-gray-800 rounded-lg overflow-hidden shadow hover:shadow-lg transition">
          <img src={item.image} alt={item.title} className="w-full h-48 object-cover"/>
          <div className="p-4">
            <h4 className="text-lg font-semibold mb-1">{item.title}</h4>
            <p className="text-gray-300 text-sm">{item.description}</p>
          </div>
        </div>
      ))}
    </div>
  );
}