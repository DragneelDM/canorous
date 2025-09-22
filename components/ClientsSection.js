import clientsData from "@data/clientsData.json";

/**
 * @param {Object} props
 * @param {"landing" | "unreal" | "manufacturing" | "studio3d"} props.page
 * @param {boolean} [props.showSectionTitle]
 */
export default function ClientsSection({ page, showSectionTitle = true }) {
  let filteredClients = [];

  if (page === "landing") {
    filteredClients = clientsData.clients.filter(c => c.showOnLanding);
  } else if (page === "unreal") {
    filteredClients = clientsData.clients.filter(c => c.type === "unreal");
  } else if (page === "manufacturing") {
    filteredClients = clientsData.clients.filter(c => c.type === "manufacturing");
  } else if (page === "studio3d") {
    filteredClients = clientsData.clients.filter(c => c.type === "studio3d");
  }

  if (filteredClients.length === 0) return null;

  return (
    <section className="py-16 bg-gray-900 text-white text-center">
      {showSectionTitle && <h2 className="text-2xl font-bold mb-12">Our Clients</h2>}

      <div className={`flex flex-wrap justify-center gap-6`}>
        {filteredClients.map((client, idx) => (
          <div key={idx} className="w-32 h-20 flex items-center justify-center bg-gray-800 rounded shadow">
            <img src={client.logo} alt={client.name} className="max-h-12 object-contain" />
          </div>
        ))}
      </div>
    </section>
  );
}
