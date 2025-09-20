export default function ServiceCard({ title, description, icon }) {
  return (
    <div className="bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
      {icon && <div className="mb-4 text-blue-400 text-3xl">{icon}</div>}
      <h3 className="text-xl font-semibold mb-2">{title}</h3>
      <p className="text-gray-300">{description}</p>
    </div>
  );
}
