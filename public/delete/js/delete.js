document.addEventListener("DOMContentLoaded", () => {
    const menus = document.querySelectorAll(".delmenu");

    menus.forEach((menu) => {
        menu.addEventListener("click", () => {
        const id=menu.getAttribute("id");
        $(`#postMenuModal-${id}`).modal("show");
               
    });
});
});
