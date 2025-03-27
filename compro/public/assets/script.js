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