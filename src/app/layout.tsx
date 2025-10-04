import { Geist, Geist_Mono } from "next/font/google";
import "./globals.css";
import Navbar from "@components/Navbar";
import Footer from "@components/Footer";
import { defaultMetadata } from "src/data/metadata";




const geistSans = Geist({
  variable: "--font-geist-sans",
  subsets: ["latin"],
});

const geistMono = Geist_Mono({
  variable: "--font-geist-mono",
  subsets: ["latin"],
});

export const metadata = defaultMetadata;

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <head>
        {/* Tailwind CDN */}
        <link
          href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.4/dist/tailwind.min.css"
          rel="stylesheet"
        />
      </head>
      <body className={`${geistSans.variable} ${geistMono.variable} antialiased`}>
        <Navbar />
        {children}
        <Footer/>
      </body>
    </html>
  );
}
