//kapsla Start
(function () {

    
    jQuery(function ($){
        // VAR
        var _currentHuvudomradeID = $('#currentTID').html(); // div id= currentTID
        var _drpFilter = $('#drpFilter');

        var localOrServerURL = "http://dev.kulturivast.se.www359.your-server.de"; //"http://kivdev.monoclick-dev.se"; // http://dev.kulturivast.se.www395.your-server.de webservern att hämta data ifrån
        //var mozaikItems = [];
        var _drphuvudomradenlista = [];
        var _drphuvudomradenvalue = [];        
        var _breadcrumbval = [];
        var _breadcrumbindex = [];

        var _renderDOMList = "";
        var _renderDrpList = "";
        var _filtreranamn = "Avgränsa";
        

        // OBJECT LITERALS
        var _RenderOutputListObj = {
            rubrik: "",
            overrub: "",
            ingress: "",
            huvudomrade: "",
            kategoritaggning: "",
            datum: "",
            link: "",
            bild: "",
            extra: ""
        }

        var _RenderOutputdrpObj = {
            namn: "",
            value: ""   
        }

        // WEBSERVICE START
        function kivSearchJsonData(searchstr, callback) {
            var serverrequest = localOrServerURL + "/json-kivsearch/" + searchstr + "?callback=?";
            $.ajax({
                type: "GET",
                url: serverrequest,
                dataType: "jsonp",
                success: function (data) {
                    var currentdomitems = "";
                    
                    for (var x = 0; x < data.kivsearch.length; x++) {

                        _RenderOutputListObj.bild = data.kivsearch[x].kivsearchitem.bild;
                        _RenderOutputListObj.overrub = data.kivsearch[x].kivsearchitem.overrub;
                        _RenderOutputListObj.rubrk = data.kivsearch[x].kivsearchitem.rubrik;
                        _RenderOutputListObj.link = data.kivsearch[x].kivsearchitem.link;
                        _RenderOutputListObj.ingress = data.kivsearch[x].kivsearchitem.ingress;

                        currentdomitems += Renderdata(_RenderOutputListObj);

                    };
                   
                    _renderDOMList = currentdomitems;

                    callback(currentdomitems);
                   
                    return false;
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert("Nått blev fel!"); // <-- skicka error json !!!!

                }
            });                     
            
        };

        // listar alla huvudområdena i en dropdown lista
        var initomradesdrp = function (omradesid) {
            var serverrequest = localOrServerURL + "/json-kivsearch-cat/" + omradesid + "?callback=?";
            
            $.ajax({
                type: "GET",
                url: serverrequest,
                dataType: "jsonp",
                success: function (data) {

                    var currentdomitems = "";
                    var removedubbletter=[];
                    
                    AddFilterdrpInit();

                    for (var x = 0; x < data.kivsearch.length; x++) {
                        var tid = data.kivsearch[x].kivomraden.tid;
                        if (removedubbletter.length > 0) {
                            if (removedubbletter.indexOf(tid) == -1) {
                                _RenderOutputdrpObj.namn = data.kivsearch[x].kivomraden.kategoritaggning;
                                _RenderOutputdrpObj.value = tid;
                                removedubbletter.push(tid);

                                if (_breadcrumbindex.indexOf(tid) == -1) {
                                    AddOmradenToDrp(_RenderOutputdrpObj.value, _RenderOutputdrpObj.namn);
                                };                                
                            }

                        } else {
                            _RenderOutputdrpObj.namn = data.kivsearch[x].kivomraden.kategoritaggning;
                            _RenderOutputdrpObj.value = tid;
                            removedubbletter.push(tid);
                            if (_breadcrumbindex.indexOf(tid) == -1) {
                                AddOmradenToDrp(_RenderOutputdrpObj.value, _RenderOutputdrpObj.namn);
                            };
                        }
                       
                    };
                    AddOmradenToDrp(_currentHuvudomradeID, "Se alla");//lägg till visa alla Sist;
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert("Nått blev fel!"); // <-- skicka error json !!!!

                }
            });

            return false;

        }
        // WEBSERVICE END

        var Renderdata = function (incRenderOutputObj) {
            var tmpstr ="";
            
                tmpstr += "<div class='large-4 medium-6 small-12 columns item'><div class='mozaikimg'>";
                tmpstr += "<a href='" + incRenderOutputObj.link + "'><img src='" + incRenderOutputObj.bild + "' /></a></div>";
                tmpstr += "<div class='mozaikitems'><div class='row'>";
                tmpstr += "<div class='small-10 columns'><a href='" + incRenderOutputObj.link + "'><h5>" + incRenderOutputObj.overrub + "</h5><h4>" + incRenderOutputObj.rubrk + "</h4></a></div>";
                tmpstr += "<div class='small-2 columns'><a href='' class='showingresstext'><i class='closed'><img alt='Visa' src='http://dev.kulturivast.se.www359.your-server.de/sites/all/themes/kivnew/images/plussicon.png'></i></a></div>";
                tmpstr += "<div class='medium-12 columns ingresstext'>" + incRenderOutputObj.ingress + "</div></div></div></div>";

           return tmpstr;
        };
      
        // FUNKTIONER
        var RenderDomItem = function (renderitem) {
            $('#kivisotope .wrapper').html(""); //remove all child nodes   
            $('#kivisotope .wrapper').html(renderitem);
           
            $('.kivisotope').isotope("destroy");
            $('.kivisotope').isotope({
                itemSelector: '.item',                
                masonry: {
                    // use element for option
                    columnWidth: 300
                }
            });
            $('.loader').hide();
            return false;
        }

        var FilterRender = function () {
            // gör filtrering
            var tmpstrlist = "";
            for (index = 0; index < _breadcrumbindex.length; ++index) {
                if (index == 0) {
                    tmpstrlist += _breadcrumbindex[index];
                } else {
                    tmpstrlist += "," + _breadcrumbindex[index];
                }
            }
            var getomrviaAjax = "";

            if (tmpstrlist) {
                getomrviaAjax = _currentHuvudomradeID + "," + tmpstrlist;
            } else {
                getomrviaAjax = _currentHuvudomradeID;
            };
            
            kivSearchJsonData(getomrviaAjax, function (datat) {
                
                initomradesdrp(getomrviaAjax);// lägger till alla kopplade länkar                
                RenderDomItem(datat);
            });            
        };

        var ResetFilter = function () {
            $("#breadcrumbval").empty();
            _drpFilter.empty();
            _breadcrumbindex = [];
            _breadcrumbval = [];
            _drphuvudomradenlista = [];
            _drphuvudomradenvalue = [];
            _RenderOutputdrpObj = [];
            _renderDOMList = "";
            _renderDrpList = "";            
                       
            initomradesdrp(_currentHuvudomradeID);// lägger till alla kopplade länkar

            FilterRender();
        };
        
            //lägger till options först i filterdropdownen
        var AddFilterdrpInit = function () {
            _drpFilter.empty();
            var newOption = $('<option>' + _filtreranamn + '</option>'); // lägg alltid till option överst i listan
            _drpFilter.append(newOption);
        }
        var AddOmradenToDrp = function (value, name) {            
            var newOption = $('<option value="' + value + '">' + name + '</option>');
            _drpFilter.append(newOption);

            _drpFilter.trigger("chosen:updated");
            return true;
        }
        

        /// BREADCRUMB START  (lägg över till helper js)

            // Lägger till breadrumb valt område från arrayerna med a-länkar och index OBS måste ha samma index!!!
        var Addtobreadcrumbval = function (valomr, valdid) {
            var addhref = "";
            if (valomr != "Se alla") {
                addhref = "<li><a href=''class='removebreadcrumbval' rel='" + valdid + "'>" + valomr + "</a></li>";
            }
            
            // Lägger tillendast här ifrån annars blir det osynk
            _breadcrumbval.push(addhref);
            _breadcrumbindex.push(valdid);

            FilterRender();
          
            $("#breadcrumbval").append(addhref);
            return false;
        }

        // tabort valt breadrumb område från arrayerna med a-länkar och index OBS måste ha samma index!!!
        var Delbreadcrumval = function (valid) {
            var rerender="";
            var i = _breadcrumbindex.indexOf(valid);
            if (i != -1) {
                // tar bort endast här ifrån annars blir det osynk
                _breadcrumbindex.splice(i, 1);
                _breadcrumbval.splice(i, 1);
            }

            $.each(_breadcrumbval,function(item, val){
                rerender += val;
            });

            FilterRender();

            $("#breadcrumbval").html(rerender);
            return false;

        }
        /// BREADCRUMB END
        
        // EVENTS START
        $('#drpFilter').change(function (e) {
            $('.loader').show();

            var currentdrp = $("#drpFilter option:selected");
            var valtid = currentdrp.val();
            var valtomr = currentdrp.text();

            //add to breadcrumb
            if (valtid == _currentHuvudomradeID) {
                ResetFilter();
            } else {
                Addtobreadcrumbval(valtomr, valtid);
            }
            $('.kivisotope').isotope("layout");
        });
       
        $(document).on('click', '.removebreadcrumbval', function () {
            //Del from breadcrumb
            $('.loader').show();
            var relval = $(this).attr('rel'); // hämta områsdesid
            Delbreadcrumval(relval);
            return false;
        });
        // EVENTS END


        // SETTINGS
        var init = function () {
            if (_currentHuvudomradeID) {
                initomradesdrp(_currentHuvudomradeID);// lägger till alla kopplade länkar
            };
        };
        
        // INITIERING
        init();

        

});//Jqueryready end


})();//kapsla END