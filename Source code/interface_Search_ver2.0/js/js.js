var infoWindow;
      var map;
      
     //  var imageUrl = {
    	// canho: {
     //      image: 'image/canho.png'
     //    },
     //    chungcu: {
     //      image: 'image/chungcu.png'
     //    },
     //    phongtro: {
		   //    image : 'image/phongtro.png'
     //    },
     //    nguyencan: {
		   //    image : 'image/nguyencan.png'
     //    },
     //    oghep:{
     //      image: 'image/oghep.png'
     //    }
     //  };
      // var homes = {
      //   canho: {
      //     text: 'Căn Hộ'
      //   },
      //   chungcu: {
      //     text: 'Chung Cư'
      //   },
      //   Single room: {
      //     text: 'Phòng Trọ'
      //   },
      //   nguyencan: {
      //     text: 'Nguyên Căn'
      //   },
      //   oghep: {
      //     text: 'Ở Ghép'
      //   }
      // };
        function initMap() {
         map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(16.055412, 108.202587),
          zoom: 13
        });
         infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          
            
            var zones = document.getElementsByTagName('zone');
            Array.prototype.forEach.call(zones, function(zoneelement) {
              var id = zoneelement.getAttribute('id');
              var address = zoneelement.getAttribute('address');
              // var type = zoneelement.getAttribute('type');
              var name = zoneelement.getAttribute('name')
              var minprice = zoneelement.getAttribute('min_price');
              var maxprice = zoneelement.getAttribute('max_price');
              var count = zoneelement.getAttribute('count');
              var point = new google.maps.LatLng(
                  parseFloat(zoneelement.getAttribute('lat')),
                  parseFloat(zoneelement.getAttribute('lng')));
              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              var spanaddress = document.createElement('span');
              var aTag = document.createElement('a');
              var p = document.createElement('p');
              var span = document.createElement('span');
              var idspan = document.createElement('span');
              var countBlock = document.createElement('span');
              // strong.className = 'address'
              p.className = 'detail_block';
               aTag.className = 'detail';
               // document.createStyleSheet().addRule('.detail:hover', 'text-decoration:underline;');
               // var TypeName = homes[type];
               idspan.textContent = 'ID: '+id;
               countBlock.textContent = 'Còn Trống : '+count;
              span.textContent = 'Giá từ : '+minprice+' - '+maxprice;
              strong.textContent = name;
              spanaddress.textContent = address;
              aTag.textContent = "Xem Chi Tiet";
              p.style.cssText = 'text-align: center';
              aTag.href = "van-detail-property.html?idzone="+id;
              p.appendChild(aTag);
              infowincontent.appendChild(strong);
              
              infowincontent.appendChild(document.createElement('br'));
			  
              // var text = document.createElement('text');
              // text.textContent = address
               infowincontent.appendChild(idspan);
               infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(spanaddress);
              infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(span);
              infowincontent.appendChild(document.createElement('br'));
              infowincontent.appendChild(countBlock);
               infowincontent.appendChild(document.createElement('br'));  
                infowincontent.appendChild(p);
              // var icon = imageUrl[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: {
                        url: 'image/nguyencan.png',
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