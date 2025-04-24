document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let logoContainer = document.querySelector(".header-logo-container"); // Simpan referensi elemen logo
    let parentContainer = logoContainer.parentElement; // Simpan parent untuk menyisipkan kembali
    
    document.getElementById("offcanvasNavbar").addEventListener("show.bs.offcanvas", function () {
        if (logoContainer) {
            logoContainer.remove();
        }
    });

    document.getElementById("offcanvasNavbar").addEventListener("hidden.bs.offcanvas", function () {
        if (!document.querySelector(".header-logo-container") && parentContainer) {
            parentContainer.insertBefore(logoContainer, parentContainer.firstChild);
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let activityContainer = document.querySelector(".activity");
    let items = document.querySelectorAll(".activity-item");
    let itemCount = items.length;

    if (itemCount > 0) {
        let rows = 1; // Default 1 baris

        if (itemCount > 3 && itemCount <= 6) {
            rows = 2; // 4-6 aktivitas, 2 baris
        } else if (itemCount > 6) {
            rows = 3; // 7-9 aktivitas, 3 baris
        }

        let itemHeight = items[0].offsetHeight;
        let totalHeight = rows * itemHeight + (rows - 1) * 20; // Total tinggi + jarak antar baris

        activityContainer.style.minHeight = totalHeight + "px";
    }
});



const scrollUpBtn = document.getElementById('scroll-up-btn');

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollUpBtn.style.display = "block";
    } else {
        scrollUpBtn.style.display = "none";
    }
}

scrollUpBtn.addEventListener('click', function() {
    document.body.scrollTop = 0; 
    document.documentElement.scrollTop = 0; 
});

document.addEventListener("DOMContentLoaded", function () {
    const select = document.getElementById("negara");
  
    const countries = [
      "Indonesia", "Malaysia", "Singapore", "Thailand", "Vietnam", "Philippines",
      "China", "Japan", "India", "United States", "United Kingdom", "Germany",
      "France", "Netherlands", "Australia", "Canada", "Brazil", "Italy",
      "Spain", "Russia", "Mexico", "South Africa", "Turkey", "New Zealand"
    ];
  
    const defaultOption = document.createElement("option");
    defaultOption.disabled = true;
    defaultOption.selected = true;
    select.appendChild(defaultOption);
  
    countries.forEach(function (country) {
      const option = document.createElement("option");
      option.value = country;
      option.textContent = country;
      select.appendChild(option);
    });
  });
  