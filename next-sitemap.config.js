/** @type {import('next-sitemap').IConfig} */
module.exports = {
  siteUrl: "https://canorous.com", // ✅ change to your real domain
  generateRobotsTxt: true,         // generates robots.txt
  sitemapSize: 7000,               // good for large sites
  changefreq: "weekly",
  priority: 0.7,
  transform: async (config, path) => {
    // Give special priority to landing page
    if (path === "/") {
      return { loc: path, changefreq: "daily", priority: 1.0, lastmod: new Date().toISOString() };
    }
    return { loc: path, changefreq: config.changefreq, priority: config.priority, lastmod: new Date().toISOString() };
  },
  exclude: ["/admin/*", "/drafts/*"], // optional
};
