//kapsla Start
(function () {
    $(function () {
        // VAR
        var _currentHuvudomradeID; // div id= currentTID
        var localOrServerURL = "http://dev.kulturivast.se.www395.your-server.de"; //"http://kivdev.monoclick-dev.se"; // http://dev.kulturivast.se.www395.your-server.de webservern att hämta data ifrån
        var mozaikItems = [];
        

        // OBJECT LITERALS
        var _RenderOutputObj = {
            "title" : "",
            "body" : "",
            "Huvudomrade" : "",
            "kategoritaggning" : ""    
        }


        // WEBSERVICE START
        function kivSearchJsonData(searchstr, callback) {

            $.ajax({
                type: "GET",
                url: localOrServerURL + "/json-kivsearch/"+searchstr+"?callback=?",
                dataType: "jsonp",
                success: function (data) {

                    var i = 1;
                    $.each(data.kivsearch.kivsearchitem, function (item, val) {

                        bookid[i] = val.bookid;
                   
                        mainhtmloutput(bookid[1], present[1], pageurl[1], forfattare[1], title[1], forlag[1], isbn[1], ljudfil[1], upplasare[1]);
                        i++;
                        return false;
                    });             

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert("Nått blev fel!"); // <-- skicka error json !!!!

                }
            });

           
            
        };


        var initomradesdrp = function (omradesid) {

            $.ajax({
                type: "GET",
                url: localOrServerURL + "/json-kivsearch-cat/" + omradesid + "?callback=?",
                dataType: "jsonp",
                success: function (data) {

                    var i = 1;
                    $.each(data.kivsearch.kivsearchitem, function (item, val) {

                        bookid[i] = val.bookid;

                        mainhtmloutput(bookid[1], present[1], pageurl[1], forfattare[1], title[1], forlag[1], isbn[1], ljudfil[1], upplasare[1]);
                        i++;
                        return false;
                    });

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert("Nått blev fel!"); // <-- skicka error json !!!!

                }
            });

            return false;

        }
        // WEBSERVICE END

        var renderdata = function (incRenderOutputObj) {
            var tmpstr ="";
            $.each(incRenderOutputObj, function (item, val) {
                tmpstr = "<div class='large-4 medium-6 small-12 columns item'><div class='mozaikimg'>";
                tmpstr =+ "<img src='"+ val.image + "' /></div>";
                tmpstr =+ "<div class='mozaikitems'><div class='row'>";
                tmpstr =+ "<div class='small-10 columns'><a href='#'><h5>"+ val.subtitle + "</h5><h4>"+ val.title + "</h4></a></div>";
                tmpstr =+ "<div class='small-2 columns'><a href='' class='showingresstext'><i class='closed'>+</i></a></div>";
                tmpstr =+ "<div class='medium-12 columns ingresstext'>"+ val.ingress + "</div></div></div></div>";
            });
            return tmpstr;
        };

        // EVENT HANDLERs

        $('#drpFilter').change(function (e) {
            //
            //var searchObj = [];
            //var str = "";
            //$("#drpFilter option:selected").each(function () {
            //    str += $(this).text() + " ";
            //});
            var str = $("#drpFilter option:selected").text();
            //do AJAXCALL
            kivSearchJsonData("16", function(datat){
                renderdata(datat, function (str) {
                    $(".wrapper, .kivlistview").html(str);
                })
            });

        });
    


        // SETTINGS
        var init = function () {
            // hämta current område
            _currentHuvudomradeID = $('#currentTID').html();

            if (_currentHuvudomradeID) {

                //initera dropdown
                initomradesdrp(_currentHuvudomradeID);

            };

        };

        // INITIERING
        init();

        var datatlocal = {
            "kivsearch": [{
                "kivsearchitem": {
                    "title": "Teater",
                    "body": "",
                    "Huvudomr\u00e5de": "Scenkonst",
                    "kategoritaggning": ""
                }
            }, {
                "kivsearchitem": {
                    "title": "husfilmer",
                    "body": "",
                    "Huvudomr\u00e5de": "Film",
                    "kategoritaggning": "Arkitektur"
                }
            }, {
                "kivsearchitem": {
                    "title": "Arkitekt",
                    "body": "",
                    "Huvudomr\u00e5de": "Arkitektur",
                    "kategoritaggning": "Arkitektur"
                }
            }, {
                "kivsearchitem": {
                    "title": "Ren dans",
                    "body": "",
                    "Huvudomr\u00e5de": "Dans",
                    "kategoritaggning": ""
                }
            }, {
                "kivsearchitem": {
                    "title": "Ren arkitektur",
                    "body": "",
                    "Huvudomr\u00e5de": "Arkitektur",
                    "kategoritaggning": ""
                }
            }, {
                "kivsearchitem": {
                    "title": "Hollywodd i stan",
                    "body": "",
                    "Huvudomr\u00e5de": "Film",
                    "kategoritaggning": "Dans"
                }
            }, {
                "kivsearchitem": {
                    "title": "Dansa dansa dansa",
                    "body": "",
                    "Huvudomr\u00e5de": "Dans",
                    "kategoritaggning": "Film, Scenkonst"
                }
            }, {
                "kivsearchitem": {
                    "title": "dansa p\u00e5 gator",
                    "body": "",
                    "Huvudomr\u00e5de": "Dans",
                    "kategoritaggning": "Arkitektur, Frame"
                }
            }, {
                "kivsearchitem": {
                    "title": "dans i hus",
                    "body": "",
                    "Huvudomr\u00e5de": "Dans",
                    "kategoritaggning": "Arkitektur"
                }
            }, {
                "kivsearchitem": {
                    "title": "Villatr\u00e4dg\u00e5rden",
                    "body": "",
                    "Huvudomr\u00e5de": "Arkitektur",
                    "kategoritaggning": "Dans"
                }
            }, {
                "kivsearchitem": {
                    "title": "H\u00f6ghus",
                    "body": "Curabitur aliquet quam id dui posuere blandit. Nulla porttitor accumsan tincidunt. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\n",
                    "Huvudomr\u00e5de": "Arkitektur",
                    "kategoritaggning": ""
                }
            }, {
                "kivsearchitem": {
                    "title": "HUs och byggnader",
                    "body": "Curabitur aliquet quam id dui posuere blandit. Nulla porttitor accumsan tincidunt. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.\n",
                    "Huvudomr\u00e5de": "Arkitektur",
                    "kategoritaggning": ""
                }
            }
            ]
        };


});//Jqueryready end


})();//kapsla END