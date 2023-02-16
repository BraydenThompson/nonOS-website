// When window is resized, call collision checks
window.addEventListener("resize", keepWindowsWithinScreen);

function toggleElement(name, reset= false) {
    // TODO: have to click twice first time? but not like a double click like clicking it twice idk you figure it out
    var e = document.getElementById(name);
    if (e.style.visibility === "hidden") {
        e.style.visibility = "visible";
    } else {
        e.style.visibility = "hidden";

        // Reset location (for close)
        if (reset) {
            resetLocationScale(e);
            e.classList.remove("fullscreen");
        }
    }
}

function toggleFullscreen(name) {
    var e = document.getElementById(name);

    // Check if not already fullscreened
    if (!e.classList.contains("fullscreen")) {
        e.classList.add("fullscreen");
        e.style.top = 0;
        e.style.left = 0;
        e.style.width = "100%";
        e.style.height = "calc(100% - 50px)";
    } else {
        resetLocationScale(e);
        e.classList.remove("fullscreen");
    }

}

function keepWindowsWithinScreen() {
    windows = document.querySelectorAll(".window");
    windows.forEach(myWindow => {
        var rect = myWindow.getBoundingClientRect();
        if (rect.top < 0) {
            myWindow.style.top = 0;
            myWindow.style.height = window.innerHeight - 50;
        }

        if (rect.left < 0) {
            myWindow.style.left = 0;
            myWindow.style.width = window.innerWidth;
        }

        if (rect.right > window.innerWidth) {myWindow.style.left = window.innerWidth - rect.width;}
        if (rect.bottom > window.innerHeight - 50) {myWindow.style.top = window.innerHeight - rect.height - 50;}
    });
}

function resetLocationScale(e) {
    e.style.top = "";
    e.style.left = "";
    e.style.width = "";
    e.style.height = "";
}