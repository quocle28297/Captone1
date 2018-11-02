/*global jQuery */
/* Contents
// ------------------------------------------------>
	1.  BACKGROUND INSERT
	2.  NAV MODULE
	3.	MOBILE MENU
	4.  HEADER AFFIX
	5.  OWL CAROUSEL
	6.  MAGNIFIC POPUP
	7.  MAGNIFIC POPUP VIDEO
	8.  SWITCH GRID
	9.  SCROLL TO
	10. SLIDER RANGE
	11. Dropzone UPLOAD
	12. REMOVE PROFILE PHOTO
	13. SHOW OPTIONS

*/
var infoWindow;
      var map;
      
      var imageUrl = {
        canho: {
          image: 'image/canho.png'
        },
        chungcu: {
          image: 'image/chungcu.png'
        },
        phongtro: {
              image : 'image/phongtro.png'
        },
        nguyencan: {
              image : 'image/nguyencan.png'
        },
        oghep:{
          image: 'image/oghep.png'
        }
      };
      var homes = {
        canho: {
          text: 'Căn Hộ'
        },
        chungcu: {
          text: 'Chung Cư'
        },
        phongtro: {
          text: 'Phòng Trọ'
        },
        nguyencan: {
          text: 'Nguyên Căn'
        },
        oghep: {
          text: 'Ở Ghép'
        }
      };

        function initMap() {
         map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(16.055412, 108.202587),
          zoom: 15
        });
         infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('../xmlfile.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              var aTag = document.createElement('a');
              var p = document.createElement('p');
              var span = document.createElement('span');
              span.className = 'type_block';
              p.className = 'detail_block';
               aTag.className = 'detail';
               var TypeName = homes[type];
               span.textContent = ' ('+TypeName.text+')';
              strong.textContent = name
                aTag.textContent = "Xem Chi Tiet";
              aTag.href = "http://google.com";
              p.appendChild(aTag);
              infowincontent.appendChild(strong);
              infowincontent.appendChild(span);
              infowincontent.appendChild(document.createElement('br'));
              
              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));
                infowincontent.appendChild(p);
              var icon = imageUrl[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: {
                        url: icon.image,
                        size: new google.maps.Size(45, 45),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(0, 20),
                        scaledSize: new google.maps.Size(35, 35),
                        labelOrigin: new google.maps.Point(9, 8)
                      }
                // label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
            
                infoWindow.open(map, marker);
                
              });
            });
          });
        }

        function currentLocation(){
          if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
             var point = new google.maps.LatLng(
                  parseFloat(position.coords.latitude),
                  parseFloat(position.coords.longitude));
            var locationMarker = new google.maps.Marker({
                map: map,
                position: point,
                icon: {
                        url: 'image/locate.png',
                        size: new google.maps.Size(45, 45),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(0, 20),
                        scaledSize: new google.maps.Size(30, 40),
                        labelOrigin: new google.maps.Point(9, 8)
                      }
              });
            infoWindow.setPosition(pos);
            infoWindow.setContent('Vị Trí Hiện tại.');
            infoWindow.open(map,locationMarker);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        }
        function SetNoneAttribute(imgSrc){
          var img = document.getElementsByTagName('img');
          Array.prototype.forEach.call(img,function(temp){
            if (temp.getAttribute("src")==imgSrc) {
              temp.style.display = "none";
              
            }
           
          });
          
        }
        function SetBlockAttribute(imgSrc){
          var img = document.getElementsByTagName('img');
          Array.prototype.forEach.call(img,function(temp){
            if (temp.getAttribute("src")==imgSrc) {
              temp.style.display = "block";
              
            }
           
          });
          
        }
      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }
      var homevar = 'image/chungcu.png';
      function doNothing() {}
       function checkbox(){
        var ischeckcanho = document.getElementById("canho_check");
        var ischeckchungcu = document.getElementById("chungcu_check");
        var ischecknguyencan = document.getElementById("nguyencan_check");
        var ischeckphongtro = document.getElementById("phongtro_check");
        var ischeckoghep = document.getElementById("oghep_check");
        if(ischeckcanho.checked==true)
          SetBlockAttribute("image/canho.png");
        else
          SetNoneAttribute("image/canho.png");
        if(ischeckchungcu.checked==true)
          SetBlockAttribute("image/chungcu.png");
        else
          SetNoneAttribute("image/chungcu.png");
        if(ischecknguyencan.checked==true)
          SetBlockAttribute("image/nguyencan.png");
        else
          SetNoneAttribute("image/nguyencan.png");
        if(ischeckphongtro.checked==true)
          SetBlockAttribute("image/phongtro.png");
        else
          SetNoneAttribute("image/phongtro.png");
        if(ischeckoghep.checked==true)
          SetBlockAttribute("image/oghep.png");
        else
          SetNoneAttribute("image/oghep.png");
      }
      $(document).ready(function(){
        $(".typebtn").click(function(){
          if(!$(".typecheckbox").hasClass("block")){
            $(".typecheckbox").slideDown();
            $(".typecheckbox").addClass("block");
          }
          else{
            $(".typecheckbox").slideUp();
            $(".typecheckbox").removeClass("block");
          }
        });
      });
(function($) {
    "use strict";

    /* ------------------  Background INSERT ------------------ */

    var $bgSection = $(".bg-section");
    var $bgPattern = $(".bg-pattern");
    var $colBg = $(".col-bg");

    $bgSection.each(function() {
        var bgSrc = $(this).children("img").attr("src");
        var bgUrl = 'url(' + bgSrc + ')';
        $(this).parent().css("backgroundImage", bgUrl);
        $(this).parent().addClass("bg-section");
        $(this).remove();
    });

    $bgPattern.each(function() {
        var bgSrc = $(this).children("img").attr("src");
        var bgUrl = 'url(' + bgSrc + ')';
        $(this).parent().css("backgroundImage", bgUrl);
        $(this).parent().addClass("bg-pattern");
        $(this).remove();
    });

    $colBg.each(function() {
        var bgSrc = $(this).children("img").attr("src");
        var bgUrl = 'url(' + bgSrc + ')';
        $(this).parent().css("backgroundImage", bgUrl);
        $(this).parent().addClass("col-bg");
        $(this).remove();
    });

    /* ------------------  NAV MODULE  ------------------ */
	
    var $moduleIcon = $(".module-icon"),
        $moduleCancel = $(".module-cancel");
    $moduleIcon.on("click", function(e) {
        $(this).parent().siblings().removeClass('module-active'); // Remove the class .active form any sibiling.
        $(this).parent(".module").toggleClass("module-active"); //Add the class .active to parent .module for this element.
        e.stopPropagation();
    });
    // If Click on [ Search-cancel ] Link
    $moduleCancel.on("click", function(e) {
        $(".module").removeClass("module-active");
        e.stopPropagation();
    });

    $(".side-nav-icon").on("click", function() {
        if ($(this).parent().hasClass('module-active')) {
            $(".wrapper").addClass("hamburger-active");
            $(this).addClass("module-hamburger-close");
        } else {
            $(".wrapper").removeClass("hamburger-active");
            $(this).removeClass("module-hamburger-close");
        }
    });
	
    // If Click on [ Document ] and this click outside [ hamburger panel ]
    $(document).on("click", function(e) {
        if ($(e.target).is(".hamburger-panel,.hamburger-panel .list-links,.hamburger-panel .list-links a,.hamburger-panel .social-share,.hamburger-panel .social-share a i,.hamburger-panel .social-share a,.hamburger-panel .copywright") === false) {
            $(".wrapper").removeClass("page-transform"); // Remove the class .active form .module when click on outside the div.
            $(".module-side-nav").removeClass("module-active");
            e.stopPropagation();
        }
    });

    // If Click on [ Document ] and this click outside [ module ]
    $(document).on("click", function(e) {
        if ($(e.target).is(".module, .module-content, .search-form input,.cart-control .btn,.cart-overview a.cancel,.cart-box") === false) {
            $module.removeClass("module-active"); // Remove the class .active form .module when click on outside the div.
            e.stopPropagation();
        }
    });

    /* ------------------  MOBILE MENU ------------------ */

    var $dropToggle = $("ul.dropdown-menu [data-toggle=dropdown]"),
        $module = $(".module");
    $dropToggle.on("click", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).parent().siblings().removeClass("open");
        $(this).parent().toggleClass("open");
    });

    $module.on("click", function() {
        $(this).toggleClass("toggle-module");
    });
	
    $module.find("input.form-control", ".btn", ".module-cancel").on("click", function(e) {
        e.stopPropagation();
    });

    /* ------------------ HEADER AFFIX ------------------ */

    var $navAffix = $(".header-fixed .navbar-fixed-top");
    $navAffix.affix({
        offset: {
            top: 50
        }
    });

    /* ------------------ OWL CAROUSEL ------------------ */

    $(".carousel").each(function() {
        var $Carousel = $(this);
        $Carousel.owlCarousel({
            loop: $Carousel.data('loop'),
            autoplay: $Carousel.data("autoplay"),
            margin: $Carousel.data('space'),
            nav: $Carousel.data('nav'),
            dots: $Carousel.data('dots'),
            center: $Carousel.data('center'),
            dotsSpeed: $Carousel.data('speed'),
            thumbs: $Carousel.data('thumbs'),
            thumbsPrerendered: $Carousel.data('thumbs'),
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: $Carousel.data('slide-rs'),
                },
                1000: {
                    items: $Carousel.data('slide'),
                }
            }
        });
    });

    /* ------------------ MAGNIFIC POPUP ------------------ */

    var $imgPopup = $(".img-popup");
    $imgPopup.magnificPopup({
        type: "image"
    });
    $('.img-gallery-item').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
	
    /* ------------------  MAGNIFIC POPUP VIDEO ------------------ */

    $('.popup-video,.popup-gmaps').magnificPopup({
        disableOn: 700,
        mainClass: 'mfp-fade',
        removalDelay: 0,
        preloader: false,
        fixedContentPos: false,
        type: 'iframe',
        iframe: {
            markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                '</div>',
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: '//www.youtube.com/embed/%id%?autoplay=1'
                }
            },
            srcAction: 'iframe_src',
        }
    });

    /* ------------------  SWITCH GRID ------------------ */

    $('#switch-list').on("click", function(event) {
        event.preventDefault();
        $(this).addClass('active');
        $(this).siblings().removeClass("active");
        $(".properties").each(function() {
            $(this).addClass('properties-list');
            $(this).removeClass('properties-grid');
        });

    });
	
    $('#switch-grid').on("click", function(event) {

        event.preventDefault();
        $(this).addClass('active');
        $(this).siblings().removeClass("active");
        $(".properties").each(function() {
            $(this).addClass('properties-grid');
            $(this).removeClass('properties-list');
        });

    });

    /* ------------------  SCROLL TO ------------------ */

    var aScroll = $('a[data-scroll="scrollTo"]');
    aScroll.on('click', function(event) {
        var target = $($(this).attr('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 1000);
            if ($(this).hasClass("menu-item")) {
                $(this).parent().addClass("active");
                $(this).parent().siblings().removeClass("active");
            }
        }
    });

    /* ------------------ SLIDER RANGE ------------------ */

    var $sliderRange = $(".slider-range"),
        $sliderAmount = $(".amount");
    $sliderRange.each(function() {
        $(this).slider({
            range: true,
            min: 0,
            max: 1000,
            values: [0, 1000],
            slide: function(event, ui) {
                $(this).closest('.filter').find($sliderAmount).val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $(this).closest('.filter').find($sliderAmount).val("$" + $sliderRange.slider("values", 0) + " - $" + $sliderRange.slider("values", 1));
    });

    /*-------------------  Dropzone UPLOAD ---------------------*/

    if ($("#dZUpload").length > 0) {
        Dropzone.autoDiscover = false;
        $("#dZUpload").dropzone({
            url: "hn_SimpeFileUploader.ashx",
            addRemoveLinks: true,
            success: function(file, response) {
                var imgName = response;
                file.previewElement.classList.add("dz-success");
                console.log("Successfully uploaded :" + imgName);
            },
            error: function(file, response) {
                file.previewElement.classList.add("dz-error");
            }
        });
    }

    /*------------ REMOVE PROFILE PHOTO --------*/
	
    $('.delete--img').on("click", function() {
        $('.output--img').remove();
        event.preventDefault();
    });
	
    /*------------ SHOW OPTIONS --------*/
	
    $('.less--options').on("click", function() {
        $('.option-hide').slideToggle('slow');
        $(this).toggleClass('active');
        event.preventDefault();
    });

}(jQuery));