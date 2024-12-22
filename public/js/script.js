document.addEventListener("DOMContentLoaded", () => {
    const toast = document.getElementById("toast");
    if (toast) {
        setTimeout(() => {
            toast.remove();
        }, 5000); // 5000ms = 5 detik
    }
});

const openDrawerBtn = document.getElementById("openDrawerBtn");
const closeDrawerBtn = document.getElementById("closeDrawerBtn");
const drawer = document.getElementById("drawer");
const overlay = document.getElementById("drawerOverlay");

// Fungsi buka drawer

openDrawerBtn.addEventListener("click", () => {
    drawer.classList.remove("-translate-x-full");
    overlay.classList.remove("hidden");
});

// Fungsi tutup drawer
const closeDrawer = () => {
    drawer.classList.add("-translate-x-full");
    overlay.classList.add("hidden");
};

closeDrawerBtn.addEventListener("click", closeDrawer);
overlay.addEventListener("click", closeDrawer);

document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
        closeDrawer();
    }
});
