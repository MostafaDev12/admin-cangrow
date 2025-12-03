tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: "#040720",
        secondary: "#0D2F8C",

        accent: "#547CFF",

        light: "#E8ECF8",

        dark: "#010B2A",

        gray: "#6E7A99",
      },
      backgroundImage: {
        gradient: "linear-gradient(135deg, #0D6EFD 0%, #44A5FF 100%)",
      },
      gridTemplateRows: {
        2: "repeat(2, minmax(0, 1fr))",
      },
      fontFamily: {
        tajawal: ["Tajawal", "sans-serif"],
      },
      boxShadow: {
        custom: "0 10px 30px rgba(0, 0, 0, 0.1)",
      },
    },
  },
};
