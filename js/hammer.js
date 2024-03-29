// JAVASCRIPT
$(document).ready(function (keyframes, options) {
    // Bloco de códigos para transformar o slide show em um objeto "dragglebla"
    let mc = new Hammer(document.getElementById("carouselHome"));

    //mouse pointer state
    let pointerXCoord = 0;
    //image lefting
    let imageLeftCord = 0;
    //carousel width
    let carouselWidth = $(".carousel-inner").width();
    //lastmove
    let lastMove = "";

    $("#carouselHome").carousel(
        {
            //interval: false
        }
    );

    function initialize() {
        $("#carouselHome").carousel("cycle");
        carouselWidth = $(".carousel-inner").width();
        imageLeftCord = 0;
        pointerXCoord = 0;
        lastMove = "";
    }

    function snapLeft() {
        $(".item").css({ transition: "", transform: "" });
        $(".item").removeClass("prev");
        $(".item").removeClass("next");
        $("#carouselHome").carousel("prev");
        setTimeout(function() {
            initialize();
        }, 600);
    }

    function snapRight() {
        $(".item").css({ transition: "", transform: "" });
        $(".item").removeClass("prev");
        $(".item").removeClass("next");
        $("#carouselHome").carousel("next");
        setTimeout(function() {
            initialize();
        }, 600);
    }

    $(".carousel-control.left").click(function() {
        snapLeft();
    });

    $(".carousel-control.right").click(function() {
        snapRight();
    });

    //CATCH PANNING EVENTS
    mc.on("panstart panend panleft panright", function(ev) {
        //PAUSE THE CAROUSEL
        $("#carousel-example-generic").carousel("pause");

        //set next and prev with circular searching
        let prev = $(".item.active").prev();
        if (prev[0] === undefined) {
            prev = $(".carousel-inner").children().last();
        }
        prev.addClass("prev");

        let next = $(".item.active").next();
        if (next[0] === undefined) {
            next = $(".carousel-inner").children().first();
        }
        next.addClass("next");

        //if is panstart set position of cursor for calculationg different positions
        if (ev.type === "panstart") {
            pointerXCoord = ev.pointers[0].pageX;
            return 0;
        }

        //MOVING
        if (pointerXCoord !== ev.pointers[0].pageX) {
            //set last action [left-right]
            lastMove = ev.type;

            //how much do you move?
            let diff = ev.pointers[0].pageX - pointerXCoord;
            $(".item.active").css({
                transition: "initial",
                transform: "translate3d(" + (imageLeftCord + diff) + "px, 0, 0)"
            });
            $(".item.next").css({
                transition: "initial",
                transform:
                    "translate3d(" + (imageLeftCord + diff + carouselWidth) + "px, 0, 0)"
            });
            $(".item.prev").css({
                transition: "initial",
                transform:
                    "translate3d(" + (imageLeftCord + diff - carouselWidth) + "px, 0, 0)"
            });

            //set variables for next turn
            imageLeftCord += diff;
            pointerXCoord = ev.pointers[0].pageX;
        }

        //end
        if (ev.type === "panend") {
            if (imageLeftCord > carouselWidth / 2) {
                if (lastMove === "panright") {
                    snapLeft();
                    return 0;
                }
            }

            if (imageLeftCord < -(carouselWidth / 2)) {
                if (lastMove === "panleft") {
                    snapRight();
                    return 0;
                }
            }

            //return to the start position
            $(".item").css({ transition: "", transform: "" });
            initialize();
        }
    });
});
// Fim do Script \\