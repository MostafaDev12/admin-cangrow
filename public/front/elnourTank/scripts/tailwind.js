tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: "#00AEEF",
        secondary: "#0077B6", // أزرق داكن - بيدي ثبات
        accent: "#7209B7", // بنفسجي مشبع - للتباين
      },
      backgroundImage: {
        gradient: "linear-gradient(90deg, #00AEEF, #7209B7)",
      },
      fontFamily: {
        tajawal: ["Tajawal", "sans-serif"],
      },
      boxShadow: {
        custom: "0 10px 25px -5px rgba(0,174,239,0.5)",
      },
    },
  },
};
