
var toolbarHeight = 70; // The height of the toolbar, in px

// When window is resized, call collision checks
window.addEventListener("resize", keepWindowsWithinScreen);

function toggleElement(name, reset= false) {
    /*// TODO: have to click twice first time? but not like a double click like clicking it twice idk you figure it out
    var e = document.getElementById(name);
    if (e.style.visibility === "hidden") {
        $(name).show(1000);
        e.style.visibility = "visible";
    } else {
        $(name).hide(1000);
        e.style.visibility = "hidden";

        // Reset location (for close)
        if (reset) {
            resetLocationScale(e);
            e.classList.remove("fullscreen");
        }
    }*/
    $(name).toggle("slow");
    
}

/**
 * Toggles the size of the element to take up the entire usable space of the page.
 * Used to fullscreen windows.
 * @param {element} name 
 */
function toggleFullscreen(name) {
    var e = document.getElementById(name);

    // Check if not already fullscreened
    if (!e.classList.contains("fullscreen")) {
        e.classList.add("fullscreen");
        e.style.top = 0;
        e.style.left = 0;
        e.style.width = "100%";
        e.style.height = "calc(100% - " + toolbarHeight + "px)";
    } else {
        resetLocationScale(e);
        e.classList.remove("fullscreen");
    }

}

function selectImage(imageJSON) {
    title = imageJSON["title"];
    alert(title);
    // Update gallery info
    //updateGalleryInfo()

}

function openImageWindow(imageName, description, filePath, imageID) {
    /*
                <div id="exampleImage" class="window resizeable imagewindow">
                <div class="windowheader">
                    <span class="headertext">imageFilename.png</span>
                    <img class="headerbutton" src="../../img/X.png" alt="Close Window" width="30px" height="30px" onclick="toggleElement('#exampleImage', true)"/>
                    <img class="headerbutton" src="../../img/fullscreen.png" alt="Fullscreen Window" width="30px" height="30px" onclick="toggleFullscreen('exampleImage')"/>
                    <img class="headerbutton" src="../../img/minimize.png" alt="Minimize Window" width="30px" height="30px" onclick="toggleElement('#exampleImage')"/>
                </div>
                <div class="windowbody">
                    <img class="center" src="../../img/dog.png" alt="Image Description: A picture of a dog"/>
                </div>
            </div>


            <li><a class="taskbarbutton" onclick="toggleElement('#exampleImage')"><img src="../../img/dog.png"/>Example Image</a></li>

    */

    // If element does not already exist 
    if (document.getElementById(imageID) == null) {
        // Create window element
        div = document.createElement("div");
        div.id = imageID;
        div.classList.add("window");
        div.classList.add("resizeable");
        div.classList.add("imagewindow");
        div.classList.add("top");

        
        header = document.createElement("div");
        header.classList.add("windowheader");
        
        div.appendChild(header);
        
        span = document.createElement("span");
        span.classList.add("headertext");
        span.innerHTML = imageName;

        header.appendChild(span);
        
        close = document.createElement("img");
        close.classList.add("headerbutton");
        close.setAttribute("src", "../../img/X.png");
        close.setAttribute("alt", "Close Window");
        close.setAttribute("width", "30px");
        close.setAttribute("height", "30px");
        close.setAttribute("onclick", "toggleElement('#" + imageID + "', true)");
        
        header.appendChild(close);
        
        fullscreen = document.createElement("img");
        fullscreen.classList.add("headerbutton");
        fullscreen.setAttribute("src", "../../img/fullscreen.png");
        fullscreen.setAttribute("alt", "Fullscreen Window");
        fullscreen.setAttribute("width", "30px");
        fullscreen.setAttribute("height", "30px");
        fullscreen.setAttribute("onclick", "toggleFullscreen(" + imageID + ")");
        
        header.appendChild(fullscreen);
        
        minimize = document.createElement("img");
        minimize.classList.add("headerbutton");
        minimize.setAttribute("src", "../../img/minimize.png");
        minimize.setAttribute("alt", "Minimize Window");
        minimize.setAttribute("width", "30px");
        minimize.setAttribute("height", "30px");
        minimize.setAttribute("onclick", "toggleElement('#" + imageID + "')");

        header.appendChild(minimize);
        
        body = document.createElement("div");
        body.classList.add("windowbody");
        
        div.appendChild(body);
        
        image = document.createElement("img");
        image.classList.add("center");
        image.setAttribute("src", filePath);
        image.setAttribute("alt", description);
        
        body.appendChild(image);
        
        
        div.style.top = 0;
        div.style.left = 0;
        
        document.getElementsByTagName('body')[0].appendChild(div);
        
        // Add taskbar button
        li = document.createElement("li");
        li.innerHTML = "<a class='taskbarbutton'><img src='" + filePath + "'/>" + imageName + "</a>";
        li.setAttribute("onclick", "toggleElement('#" + imageID + "')");
        document.getElementById("taskbar").appendChild(li);

        // Add desktop icon
        icon = document.createElement("li");
        icon.setAttribute("onclick", "toggleElement('#" + imageID + "')");
        icon.innerHTML = "<img src='" + filePath + "'/>" + imageName;

        document.getElementById("icons").appendChild(icon);

        
        // Attach dragger
        new Dragger(document.getElementById(imageID));
    }
}

/**
 * Checks every window for collision with the browser window,
 * used to resize windows so that they always stay within the bounds of the browser.
 */
function keepWindowsWithinScreen() {
    windows = document.querySelectorAll(".window");
    windows.forEach(myWindow => {
        var rect = myWindow.getBoundingClientRect();
        if (rect.top < 0) {
            myWindow.style.top = 0;
            myWindow.style.height = window.innerHeight - 70;
        }

        if (rect.left < 0) {
            myWindow.style.left = 0;
            myWindow.style.width = window.innerWidth;
        }

        if (rect.right > window.innerWidth) {myWindow.style.left = window.innerWidth - rect.width;}
        if (rect.bottom > window.innerHeight - toolbarHeight) {myWindow.style.top = window.innerHeight - rect.height - toolbarHeight;} //70 is the size of bottom toolbar
    });
}


/**
 * Resets the position of the element to default,
 * used when "closing" windows
 * @param {element} e 
 */
function resetLocationScale(e) {
    e.style.top = "";
    e.style.left = "";
    e.style.width = "";
    e.style.height = "";
}

/**
 * Dragger function that allows windows to be dragged by their header bars
 * @param {element} element 
 */
function Dragger( element ) {
    this.element = element;
    this.x = 0;
    this.y = 0;
    // bind self for event handlers
    this.mousedownHandler = this.onmousedown.bind( this );
    this.mousemoveHandler = this.onmousemove.bind( this );
    this.mouseupHandler = this.onmouseup.bind( this );
    
    this.element.addEventListener( 'mousedown', this.mousedownHandler );
}

Dragger.prototype.onmousedown = function( event ) {
    if (event.target === this.element.querySelector(".windowheader") || event.target === this.element.querySelector(".headertext")) {
        // Re-get current element position, since it is moved by other functions
        var rect = this.element.getBoundingClientRect();

        this.x = rect.left;
        this.y = rect.top;

        this.dragStartX = this.x;
        this.dragStartY = this.y;
        this.pointerDownX = event.pageX;
        this.pointerDownY = event.pageY;

        window.addEventListener( 'mousemove', this.mousemoveHandler );
        window.addEventListener( 'mouseup', this.mouseupHandler );
    }
};

Dragger.prototype.onmousemove = function( event ) {
    var moveX = event.pageX - this.pointerDownX;
    var moveY = event.pageY - this.pointerDownY;

    this.x = this.dragStartX + moveX;
    this.y = this.dragStartY + moveY;
    // Unfulscreen
    if (this.element.classList.contains("fullscreen")) {
        this.element.classList.remove("fullscreen");
    }

    // Remove top class from any other window
    topWindows = document.querySelectorAll(".top");
    topWindows.forEach(window => {
        window.classList.remove("top");
    })

    // Set layer to top
    this.element.classList.add("top");


    // location is clamped to within the bounds of the screen
    // collision checks:
    if (this.x < 0) {this.x = 0;}
    if (this.x + this.element.offsetWidth > window.innerWidth) {this.x = window.innerWidth - this.element.offsetWidth;}
    if (this.y < 0) {this.y = 0;}
    if (this.y + this.element.offsetHeight > window.innerHeight - toolbarHeight) {this.y = window.innerHeight - this.element.offsetHeight - toolbarHeight;} // 70 is size of toolbar

    // TODO: When moving, set to top layer (keep track of # of layers)
    //this.element.style.zIndex = ;
    this.element.style.left = this.x + 'px';
    this.element.style.top = this.y + 'px';
};

Dragger.prototype.onmouseup = function() {
    window.removeEventListener( 'mousemove', this.mousemoveHandler );
    window.removeEventListener( 'mouseup', this.mouseupHandler );
};

// Attach dragger to every window element
var dragElems = document.querySelectorAll('.window');
for ( var i=0; i < dragElems.length; i++ ) {
    var dragElem = dragElems[i];
    new Dragger( dragElem );
}

function updateGalleryInfo(title, uploader, upload_time, width, height, description) {
    document.getElementById("imageName").innerHTML = sanitizeHTML(title);
    document.getElementById("imageUploaderName").innerHTML = sanitizeHTML(uploader);
    document.getElementById("imageUploadTime").innerHTML = sanitizeHTML(upload_time);
    document.getElementById("imageResolution").innerHTML = sanitizeHTML(width + " x " + height);
    document.getElementById("imageDescription").innerHTML = sanitizeHTML(description);
}

/**
 * Sanitizes an HTML string in JS
 * @param {String} text 
 * @returns sanitized string
 */
function sanitizeHTML(text) {
    var element = document.createElement('div');
    element.innerText = text;
    return element.innerHTML;
}