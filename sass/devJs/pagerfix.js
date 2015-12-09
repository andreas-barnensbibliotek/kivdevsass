
    jQuery(function ($) {

        $(document).on('click', 'a', function (e) {
           
            alert("japp");
            setTimeout(function () {
                //jQuery('.kivisotope').isotope('destroy');
                $('.kivisotope').isotope('reloadItems');
                $('.kivisotope').isotope({
                    itemSelector: '.item',
                    //containerStyle: null,
                    masonry: {
                        // use element for option
                        columnWidth: 300
                    }
                });
                $('.kivisotope').isotope('reloadItems');
                alert("tee");

            }, 3500);
       
        });
    });