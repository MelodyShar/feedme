<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FeedMe | Find Restaurant Deals Near You</title>
    <? include 'application/views/include/head.php'; ?>
  </head>
  <body>
    
	
    <? include 'application/views/include/nav.php'; ?>
     
    <section id="intro">
        <video id="video" autoplay loop>
                <source src="/application/sources/vid/footage2.mp4" type="video/mp4" />
        </video>
    	<div class="container">
        	<div class="row search">
            	<div class="col-sm-12" align="left">
                <h1 class="col-md-6 headline">Find Restaurant Deals Near You</h1>

                	<form action="<? echo base_url().'result'; ?>" method="post">

                      <div class="row col-sm-4 col-md-12">
                        <div class="form-group col-sm-6">
                        	<input type="phone" class="form-control" name="phone" placeholder="Enter your phone number">
                        </div>
                      </div>
                      <div class="row col-sm-4 col-md-12">
                        <div class="form-group col-sm-6">
                        	<input type="text" class="form-control" name="field" placeholder="What are you craving?">
                        </div>
                      </div>
                        <div class="form-group col-sm-2">
                        	<input type="submit" class="btn btn-success col-sm-12 btn-main-color" value="Find Deals">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <? include 'application/views/include/script.php'; ?>
    
  </body>
</html>