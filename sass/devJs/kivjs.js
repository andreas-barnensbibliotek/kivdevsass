

// CENTER LANDING PAGE TEXT

$(document).ready(function () {

    $(document).foundation({
        orbit: {
            stack_on_small: false,
            navigation_arrows: false,
            slide_number: false,
            pause_on_hover: false,
            resume_on_mouseout: false,
            bullets: false,
            timer: false,
            variable_height: false,
        }
    });
    
    // Menu offcanvas show hide START
    $('.left-off-canvas-toggle').on('click', function (e) {
        $('.off-canvas-wrap').foundation('offcanvas', 'show', 'move-right');
        return false;
    });

    $('.exit-off-canvas').on('click', function (e) {
        $('.off-canvas-wrap').foundation('offcanvas', 'hide', 'move-right');
    });
    // Menu offcanvas show hide END

    $(".y-center").css("top", $(".y-center").parent().height() / 3.5);

    $('.showingresstext').click(function (e) {
        var valdclass = $(this).find('i');
        var addOrRemove = valdclass.hasClass("closed");
        var st = $(this).attr("style");
        var thatobj = $(e.currentTarget).parent().siblings(".ingresstext");
        var itembottommargin = 15;


        if (thatobj.length <= 0) {           
            thatobj = $(e.currentTarget).parent().siblings().find('.ingresstext');
        } else {
            //hämta clickat item
            var cur_clicked_Item = $(e.currentTarget).parent().parent().parent().parent().attr("style");
           
            //rensa bort absolut värdet från stringen
            cur_clicked_Item = cur_clicked_Item.replace('position: absolute;', '').trim();

            ////hämta clickatitem leftvärde:                
            var start_pos = cur_clicked_Item.indexOf('left:') + 5;
            console.log("start_pos " + start_pos);
            var end_pos = cur_clicked_Item.indexOf('top:', start_pos);
            console.log("end_pos " + end_pos);
            //hämta clickatitem topvärde
            var clickeditmTop_start = cur_clicked_Item.indexOf('top:') + 4;
            console.log("clickeditmTop_start " + clickeditmTop_start);
            var clicked_item_height = cur_clicked_Item.substring(clickeditmTop_start, cur_clicked_Item.length - 3).trim();
            console.log("clicked_item_height " + clicked_item_height);

            // hämta första delen av style för sökning senare
            var itemSelectStyleValue = cur_clicked_Item.substring(0, end_pos).trim();
            var Maincontainerheight = $(this).closest('.kivisotope').attr("style");
            console.log("Maincontainerheight " + Maincontainerheight);

            //rensa bort position: relative; värdet från stringen
            Maincontainerheight = Maincontainerheight.replace('position: relative;', '').trim();
                       
            var cont_start_pos = Maincontainerheight.indexOf('height:') + 7;
            var cont_height = Maincontainerheight.substring(cont_start_pos, Maincontainerheight.length - 3).trim();
            Maincontainerheight = Maincontainerheight.substring(0, cont_start_pos).trim();
            console.log("Maincontainerheight2 " + Maincontainerheight);
            var ny_cont_height = cont_height;
            console.log("ny_cont_height " + ny_cont_height);
            var valdheight = thatobj.height();
            console.log("thatobj.height() " + thatobj.height());
            if (addOrRemove) {                
                ny_cont_height = parseFloat(ny_cont_height) + parseFloat(valdheight + itembottommargin)
                Maincontainerheight = Maincontainerheight + " " + ny_cont_height;
            } else {                
                ny_cont_height = parseFloat(ny_cont_height) - (parseFloat(valdheight - itembottommargin));
                Maincontainerheight = Maincontainerheight + " " + ny_cont_height.toString();

            }
            $(this).closest('.kivisotope').attr('style', "position: relative; "+ Maincontainerheight + "px;");

            var rakna = 0;
            var loopdom = $('div[style*="' + itemSelectStyleValue + '"]');

            loopdom.each(function (index, value) {
                //hämta clickatitem topvärde
                var currentItem = $(value).attr('style');
                //rensa bort absolut värdet från stringen
                currentItem = currentItem.replace('position: absolute;', '').trim();

                var curitmTop_start = currentItem.indexOf('top:') + 4;
                var current_item_height = currentItem.substring(curitmTop_start, currentItem.length - 3).trim();
                console.log("domloop current_item_height " + current_item_height);
                var nyposition = current_item_height;
                console.log("domloop nyposition " + nyposition);
                if (parseInt(clicked_item_height) < parseInt(current_item_height)) {

                    if (addOrRemove) {
                        nyposition = parseInt(current_item_height) + parseInt(valdheight + itembottommargin);

                    } else {
                        nyposition = parseInt(current_item_height) - parseInt(valdheight - itembottommargin);
                    }
                    var updatedStyleToAdd =" position: absolute; " + itemSelectStyleValue + ' top:' + nyposition.toString() + 'px;';
                    $(value).attr('style', updatedStyleToAdd);
                }               
            });
        }
          
        if (addOrRemove) {
            valdclass.removeClass("closed");
            valdclass.addClass("open");
            valdclass.html('-');
            
        } else {
            valdclass.addClass("closed");
            valdclass.removeClass("open");
            valdclass.html('+');
        }

         thatobj.slideToggle(100, function () {
             if (!$('i').hasClass("open")) {
                 $(this).closest('.kivisotope').isotope("layout", {
                     transitionDuration: 0
                 });
                 console.log(" isotope run-----------------");
             }
             return false;
         });

         return false;
    });

    //old
    $('.showsnabblink').click(function (e) {
        var valdclass = $(this).find('i');
       
        //alert(cur_clicked_Item + "-->" + $(this).height());
        $(this).parent().siblings(".snabblink").slideToggle("fast", function () {
            $('#kivisotope2').isotope("layout", {
                transitionDuration: 0
            });
            var addOrRemove = valdclass.hasClass("fi-plus");
            var valdheight = $(this).height();
            if (addOrRemove) {
                valdclass.addClass("fi-x");
                valdclass.removeClass("fi-plus");
            } else {
                valdclass.addClass("fi-plus");
                valdclass.removeClass("fi-x");              
            }                       
        });

        return false;
    });

    $('#lasMerOmOssLink').click(function (e) {
        var addOrRemove = $('.omossMenu').hasClass("arrowhead");
        $('.omossContentBox').slideToggle("slow", function () {            
            $('.kivisotope').isotope("layout");            
            if (addOrRemove) {
                $('.omossMenu').removeClass("arrowhead");
            };
        });
        
        if (!addOrRemove) {
            $('.omossMenu').addClass("arrowhead");
        }
        
        return false;
    });
    
    $('#kivlist').on('click', function (e) {
        $('.kivisotope').isotope('destroy');
                
        $('.kivlistview').children().attr('class',"kivlist row").attr('style',"");
        $('.mozaikimg').attr('class',"large-2 columns small-3 imgplaceholder crop-height");
        $('.mozaikitems').attr('class',"large-10 columns listcontent").removeClass('mozaikitems');                  

        return false;
    });

    $('#kivmozaik').on('click', function (e) {

        $('.kivlist').attr('class', "large-4 medium-6 small-12 columns item");
        $('.imgplaceholder').attr('class', "").addClass('mozaikimg');
        $('.listcontent').attr('class', "").addClass('mozaikitems');               

        $('.kivisotope').isotope({
            itemSelector: '.item',
            //containerStyle: null,
            masonry: {
                // use element for option
                columnWidth: 400
            }
        });        
        return false;
    })


    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });

    $('.scroll-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    /*!
     * jQuery Sticky Footer 1.1
     * Corey Snyder
     * http://tangerineindustries.com
     *
     * Released under the MIT license
     *
     * Copyright 2013 Corey Snyder.
     *
     * Date: Thu Jan 22 2013 13:34:00 GMT-0630 (Eastern Daylight Time)
     * Modification for jquery 1.9+ Tue May 7 2013
     * Modification for non-jquery, removed all, now classic JS Wed Jun 12 2013
     */

    window.onload = function () {
        stickyFooter();

        //you can either uncomment and allow the setInterval to auto correct the footer
        //or call stickyFooter() if you have major DOM changes
        //setInterval(checkForDOMChange, 1000);
    };

    //check for changes to the DOM
    function checkForDOMChange() {
        stickyFooter();
    }

    //check for resize event if not IE 9 or greater
    window.onresize = function () {
        stickyFooter();
        $('#kivisotope').isotope("layout");
    }

    //lets get the marginTop for the <footer>
    function getCSS(element, property) {

        var elem = document.getElementsByTagName(element)[0];
        var css = null;

        if (elem.currentStyle) {
            css = elem.currentStyle[property];

        } else if (window.getComputedStyle) {
            css = document.defaultView.getComputedStyle(elem, null).
            getPropertyValue(property);
        }

        return css;

    }

    function stickyFooter() {

        if (document.getElementsByTagName("footer")[0].getAttribute("style") != null) {
            document.getElementsByTagName("footer")[0].removeAttribute("style");
        }

        if (window.innerHeight != document.body.offsetHeight) {
            var offset = window.innerHeight - document.body.offsetHeight;
            var current = getCSS("footer", "margin-top");

            if (isNaN(current) == true) {
                document.getElementsByTagName("footer")[0].setAttribute("style", "margin-top:2rem;");
                current = 0;
            } else {
                current = parseInt(current);
            }

            if (current + offset > parseInt(getCSS("footer", "margin-top"))) {
                document.getElementsByTagName("footer")[0].setAttribute("style", "margin-top:" + (current + offset) + "px;");
            }
        }
    }

    /*
    ! end sticky footer
    */


});