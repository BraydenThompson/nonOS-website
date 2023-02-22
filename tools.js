var toolbarHeight = 70; // The height of the toolbar, in

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
        e.style.height = "calc(100% - " + toolbarHeight + "px)";
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

function resetLocationScale(e) {
    e.style.top = "";
    e.style.left = "";
    e.style.width = "";
    e.style.height = "";
}

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
  

  var dragElems = document.querySelectorAll('.window');
  for ( var i=0; i < dragElems.length; i++ ) {
    var dragElem = dragElems[i];
    new Dragger( dragElem );
  }