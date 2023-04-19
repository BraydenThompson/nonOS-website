function Dragger( element ) {
    toolbarheight = 70
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
    if (this.y + this.element.offsetHeight > window.innerHeight - toolbarheight) {this.y = window.innerHeight - this.element.offsetHeight - toolbarheight;} // 70 is size of toolbar

    // TODO: When moving, set to top layer (keep track of # of layers)
    //this.element.style.zIndex = ;
    this.element.style.left = this.x + 'px';
    this.element.style.top = this.y + 'px';
  };
  
  Dragger.prototype.onmouseup = function() {
    window.removeEventListener( 'mousemove', this.mousemoveHandler );
    window.removeEventListener( 'mouseup', this.mouseupHandler );
  };
  
  // --------------- //
  
  var dragElems = document.querySelectorAll('.window');
  for ( var i=0; i < dragElems.length; i++ ) {
    var dragElem = dragElems[i];
    new Dragger( dragElem );
  }