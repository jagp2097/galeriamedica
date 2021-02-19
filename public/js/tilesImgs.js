$(document).ready(function(){

  $('.tilesImg').imagesLoaded(function() {
        // Prepare layout options.
        var options = {
        	align: 'left',
        	//fillEmptySpace: true,
			itemWidth: 200,
            autoResize: false,
            //container: $('.contFotos'),
            offset: 5,
            outerOffset: 10,
            flexibleWidth: '50%'
        };

    var handler = $('.tilesImg li');
    /*var $window = $(window);
    $window.resize(function() {
        var windowWidth = $window.width(),
        newOptions = { flexibleWidth: '50%' };
        // Breakpoint
        if (windowWidth < 1024) {
            newOptions.flexibleWidth = '100%';
        }
        handler.wookmark(newOptions);
      });*/
      // Call the layout function.
      handler.wookmark(options);
      });

});
