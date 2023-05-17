$(document).ready(function () {
    $("#botonocultamuestra").click(function () {
        $("#divocultamuestra").each(function () {
            displaying = $(this).css("display");
            if (displaying == "block") {
                $(this).fadeOut('slow', function () {
                    $(this).css("display", "none");
                });
            } else {
                $(this).fadeIn('slow', function () {
                    $(this).css("display", "block");
                });
            }
        });
        $("#usuariomuestra").each(function () {
            displaying = $(this).css("display");

            $(this).fadeOut(function () {
                $(this).css("display", "none");
            });

        });
    });
});

$(document).ready(function () {
    $("#botonocultamuestraUsuario").click(function () {
        $("#usuariomuestra").each(function () {
            displaying = $(this).css("display");
            if (displaying == "block") {
                $(this).fadeOut('slow', function () {
                    $(this).css("display", "none");
                });
            } else {
                $(this).fadeIn('slow', function () {
                    $(this).css("display", "block");
                });
            }
        });
        $("#divocultamuestra").each(function () {
            displaying = $(this).css("display");

            $(this).fadeOut(function () {
                $(this).css("display", "none");
            });

        });
    }); 
});



const showOnPx = 100;
const backToTopButton = document.querySelector(".back-to-top")

const scrollContainer = () => {
    return document.documentElement || document.body;
};

document.addEventListener("scroll", () => {
    if (scrollContainer().scrollTop > showOnPx) {
        backToTopButton.classList.remove("hidden")
    } else {
        backToTopButton.classList.add("hidden")
    }
});


const goToTop = () => {
    document.body.scrollIntoView({
        behavior: "smooth",
    });
};
backToTopButton.addEventListener("click", goToTop);