document.addEventListener("DOMContentLoaded", () => {
    const menus = document.querySelectorAll(".delmenu2");

    menus.forEach((menu) => {
        menu.addEventListener("click", () => {
        const id=menu.getAttribute("id");
        $(`#postMenuModal-${id}-2`).modal("show");
               
    });
});
});
