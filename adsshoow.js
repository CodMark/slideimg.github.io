var adsliknu = document.getElementById("dsafull")
    function nunads() {
      adsliknu.classList.add("disnun");
      setInterval(() => {
        adsliknu.classList.remove("disnun");
      }, 35000);
    }