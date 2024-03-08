$(document).ready(function(){

  function setImageSize(){
    var imageHeight=Math.floor($('.product-main div img:first-child').height());
    var imageWidth=Math.floor($('.product-main div img:first-child').width());
    if(imageWidth <= 0) {
      requestAnimationFrame(setImageSize);
    }
    else {
      $('.product-main').css({width: imageWidth, height: imageHeight });
      $('.product-main div img').addClass('is-loaded');
    }
  }
  

   requestAnimationFrame(setImageSize);


  // Populate thumbnails
  $('.zooma-thumbnail').children().clone().appendTo('.zooma-main');
    
  // Set state for first image
  $('.photo-gallery img:first-child').addClass('is-active');
  
  // Thumbnail hover event listener
  $('.zooma-thumbnail div img').on('mouseenter', function() {
    $('.photo-gallery div img').removeClass('is-active is-zoomed-in').prop('style', '').off('mousemove');;
    $('.photo-gallery div img:nth-child(' + ($(this).index()+1) + ')').addClass('is-active');  

  });
  
  // Main image click to zoom event listener
  $('.product-main div img').on('click', function(e) {
    // Toggle zoom-out cursor and unset max-width
    
    

    $(this).toggleClass('is-zoomed-in');


    // Zoom in
    if ($(this).hasClass('is-zoomed-in')) {
      // var actualImage = new Image();
      // actualImage.src = $(this).css('background-image').replace(/"/g,"").replace(/url\(|\)$/ig, "");

      // Variables for calculating relative position
      var scale = e.target.naturalWidth / $(e.target).parent().width();
      var max = -(1 - 1/scale);
      
      // Adjust mouse scale to the full-size image, then redraw
      e.offsetX *= scale;
      e.offsetY *= scale;
      calculateZoom(e);
      
      // Mouse event listener
      $(this).on('mousemove', calculateZoom);
      
      function calculateZoom(e) {       
        var x = e.offsetX * max + 'px';
        var y = e.offsetY * max + 'px';
        $(e.target).css({left: x, top: y});
      }
    }
    // Zoom out
    else {
      $(this).off('mousemove').prop('style', '');
    }
  });
    

  

})



var slider = document.querySelector('.items'),
    arrows = document.querySelectorAll('.arrow-left,.arrow-right'),
    isDown = false,
    startX,
    scrollLeft;

slider.scrollLeft = 1970;

slider.onmousedown = function (e) {
    'use strict';
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
};

slider.onmouseup = function () {
    'use strict';
    isDown = false;
    slider.classList.remove('active');
};

slider.onmouseleave = function () {
    'use strict';
    isDown = false;
    slider.classList.remove('active');
};

slider.onmousemove = function (e) {
    'use strict';
    if (!isDown) { return; }
    e.preventDefault();
    var x = e.pageX - slider.offsetLeft,
        walk = x - startX;
    slider.scrollLeft = scrollLeft - walk;
};

function controlsSlider(num) {
    'use strict';
    var smooth = setInterval(function () {
        slider.scrollLeft += num;
    }, 10);
    setTimeout(function () {
        clearInterval(smooth);
    }, 210);
}
arrows[0].onclick = function () {
    'use strict';
    controlsSlider(-10);
};

arrows[1].onclick = function () {
    'use strict';
    controlsSlider(10);
};

window.onkeydown = function (e) {
    'use strict';
    var key = e.keyCode;
    if (key === 39) {
        controlsSlider(10);
    }
    if (key === 37) {
        controlsSlider(-10);
    }
};