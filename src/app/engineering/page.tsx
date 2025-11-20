import Hero from "@components/Hero";
import PortfolioSliderOriginalSize from "@components/PortfolioSliderOriginalSize";
import ClientsSection from "@components/ClientsSection";
import engineeringData from "@data/engineering.json";
import { pageMetadata } from "src/data/metadata";
import Image from "next/image";
export const metadata = pageMetadata.engineering;

const servicesBackground = "/images/engineering-hero.webp";

const serviceSections = [
  {
    title: "Digital Plant / Product Engineering",
    blurb:
      "Integrated engineering support tying mechanical, process, and structural disciplines together for connected plants.",
    items: [
      "Mechanical Design & Engineering",
      "Process & Piping",
      "Civil & Structural",
    ],
    image: "/images/digital-plant.jpg",
  },
  {
    title: "Product Support",
    blurb:
      "Lifecycle teams that shepherd products from concept to aftermarket success with rapid feedback loops.",
    items: [
      "New Product Development",
      "After Market Engineering",
      "Sustenance Engineering",
    ],
    image: "/images/product-support.jpg",
  },
  {
    title: "Simulation & Analysis",
    blurb:
      "Virtual validation to de-risk builds using multi-physics simulations, optimization, and performance studies.",
    items: ["CFD Analysis", "FEA Analysis"],
    image: "/images/simulation-analysis.jpg",
  },
];

export default function Engineering() {
  return (
    <main className="bg-gray-950 text-white">
      {/* Services */}
      <section className="relative isolate overflow-hidden py-24">
        <Image
          src={servicesBackground}
          alt=""
          fill
          sizes="100vw"
          className="absolute inset-0 -z-20 object-cover"
          priority
        />
        <div className="absolute inset-0 -z-10 bg-gradient-to-b from-gray-950/95 via-gray-950/90 to-gray-950/98" />

        <div className="relative max-w-7xl mx-auto px-4">
          <div className="mx-auto mb-16 max-w-3xl text-center text-white">
            <p className="uppercase tracking-[0.3em] text-sm text-orange-300">What We Deliver</p>
            <h2 className="mt-4 text-4xl font-bold">Engineering & Technology Services</h2>
            <p className="mt-4 text-lg text-gray-200">
              Scalable teams that own every stage of plant, product, and performance engineering—backed
              by deep domain expertise and digital toolchains.
            </p>
          </div>

          <div className="space-y-12">
            {serviceSections.map(({ title, blurb, items, image }) => (
              <article
                key={title}
                className="grid gap-10 rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl shadow-black/40 backdrop-blur-2xl md:grid-cols-2 md:p-12"
              >
                <div className="flex flex-col justify-center text-white">
                  <p className="text-xs font-semibold uppercase tracking-[0.2em] text-orange-300">
                   
                  </p>
                  <h3 className="mt-4 text-3xl font-bold">{title}</h3>
                  <p className="mt-4 text-gray-200">{blurb}</p>
                  {items.length > 0 && (
                    <ul className="mt-6 space-y-3">
                      {items.map((item) => (
                        <li key={item} className="flex items-center gap-3 text-lg text-gray-100">
                          <span className="text-2xl text-orange-300">•</span>
                          <span>{item}</span>
                        </li>
                      ))}
                    </ul>
                  )}
                </div>

                <div className="relative h-72 overflow-hidden rounded-2xl border border-white/20 bg-black/30 md:h-full">
                  <Image
                    src={image}
                    alt={title}
                    fill
                    className="object-cover object-center"
                    sizes="(max-width: 768px) 100vw, 50vw"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/10" />
                </div>
              </article>
            ))}
          </div>
        </div>
      </section>

      {/* Clients Section */}
      <ClientsSection page="engineering" />

      {/* Portfolio */}
      <section
        id="portfolio"
        className="max-w-7xl mx-auto py-16 px-4 bg-gray-900/60 border-t border-gray-800"
      >
        <h2 className="text-3xl font-bold text-white mb-8 text-center">
          Manufacturing Portfolio
        </h2>
        <PortfolioSliderOriginalSize data={engineeringData} />
      </section>
    </main>
  );
}
