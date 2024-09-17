const btns = document.querySelectorAll(".mobile-menu-button");
const menu = document.querySelector(".m-nav");

btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.currentTarget.classList.toggle("change");
        menu.classList.toggle("active"); // เพิ่มคลาส active แทนการใช้ hidden
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Get all the main menu items with dropdowns
    const mainMenuItemsWithDropdowns = document.querySelectorAll(
        'ul[id^="dropdown-"]'
    );

    mainMenuItemsWithDropdowns.forEach((dropdown) => {
        const mainMenuId = dropdown.id.replace("dropdown-", "main-");
        const mainMenu = document.getElementById(mainMenuId);

        // Add event listener only to items that have sub-menus
        mainMenu.addEventListener("click", function (event) {
            // Prevent the default action of the anchor link
            event.preventDefault();
        const arrowIcon = mainMenu.querySelector(".svg");
const meunMain = mainMenu.querySelector(".meunMain");

            // Toggle the visibility of the dropdown menu
            if (dropdown.classList.contains("hidden")) {
                dropdown.classList.remove("hidden");
                dropdown.classList.add("block");
                arrowIcon.classList.toggle("rotate-180");

            } else {
                dropdown.classList.remove("block");
                dropdown.classList.add("hidden");
                arrowIcon.classList.toggle("rotate-180");

            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const mainMenus = document.querySelectorAll(".m-nav > ul > li");

    mainMenus.forEach((mainMenu) => {
        const subMenu = mainMenu.querySelector(".submenu");
        const arrowIcon = mainMenu.querySelector(".svg");

        if (subMenu) {
            mainMenu.addEventListener("click", function (event) {
                event.preventDefault();

                // Toggle the submenu visibility
                subMenu.classList.toggle("hidden");
                subMenu.classList.toggle("open");

                // Rotate the arrow icon
                arrowIcon.classList.toggle("rotate-180");
            });

            // Prevent clicks inside submenu from closing the main menu
            subMenu.addEventListener("click", function (event) {
                event.stopPropagation();
            });
        }
    });
});
