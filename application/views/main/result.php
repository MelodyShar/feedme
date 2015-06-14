<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <? include 'application/views/include/head.php'; ?>

    
  </head>
  <body>
    
	
    <? include 'application/views/include/nav.php'; ?>
    <section id="search-bar">
      <div class="row">
        <div class="container">
        	<div align="center" class="search-form col-12">
        	<form action="<? echo base_url().'result'; ?>" class="form-inline" method="post">
                <div class="form-group col-sm-4">
                    <input type="phone" class="form-control col-sm-12" name="phone" placeholder="Enter your phone number">
                </div>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control col-sm-12" name="field" placeholder="What are you craving?">
                </div>
                <div class="form-group col-sm-4">
                    <input type="submit" class="btn btn-success col-sm-12 btn-main-color" value="Send Deals">
                </div>
            </form>
            </div>
          </div>
        </div class="container?"
    ></section>
    
    
    <? if(isset($deals) && !empty($deals)): ?>
    <section id="content" style="background:#FFF; z-index:1;">
    	<div class="row">
        		<!-- List View -->
              <div class="list col-sm-12 col-md-6 col-lg-6">
              	<div class="row">
                	<div class="container">
                    	<div class="col-sm-7" style="padding:40px">
                        <div class="score"><? if(isset($score) && !empty($score)): ?><h3><i class="fa fa-heart-o"></i> Sentiment Score: <? echo round($score*100,2).'%'; ?></h3><? endif; ?></div>
                <? foreach($deals as $row): ?>
                	<div class="result-item">
                    <h4 class="name"><? echo $row->dealProvider; ?></h4>
                    <div class="deal-description"><? echo $row->dealDescription; ?></div>
                    <div class="deal-address"><i class="fa fa-map-marker"></i><? echo $row->dealAddress.' '.$row->dealCity.', '.$row->dealState.' '.$row->dealZip; ?></div>
                    <form action="<? echo base_url().'result'; ?>" method="post">
                        <input type="hidden" name="dealId" value="<? echo $row->dealId; ?>">
                        <input type="hidden" name="phone" value="<? echo $this->input->post('phone'); ?>">
                        <input type="hidden" name="field" value="<? echo $this->input->post('field'); ?>">
                        <input type="submit" class="btn btn-success btn-redeem" name="redeem" value="Redeem Deal">
                    </form>
                  </div>
                <? endforeach; ?>
                		</div>
                	</div>
                </div>
              </div>
              <!-- Map View -->
              <div class="col-sm-12 col-md-6 col-lg-6">
                    <div id="map" width="100%" style="height: 800px;"></div>
              </div>
    	</div>
    </section>
    <? endif; ?>
    
    <script type="text/javascript"><!-- Note: center user site -->
    var locations = [
		<? foreach($deals as $row): ?>
      <? echo "['".$row->dealProvider."',".$row->dealLat.",".$row->dealLong."],"; ?>
		<? endforeach; ?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: new google.maps.LatLng(34.0506708,-118.2551963),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

	if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      map.setCenter(pos);
	  
    }, function() {
      handleNoGeolocation(true);
    });
  }

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
    
    
    <? include 'application/views/include/script.php'; ?>
    
  </body>
</html>