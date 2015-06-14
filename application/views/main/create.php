<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FeedMe | Create a Deal</title>
    <? include 'application/views/include/head.php'; ?>

  </head>
  <body>
	
    <? include 'application/views/include/nav.php'; ?>
     
    <section id="deal">
     <!--    <video id="video" autoplay loop>
                <source src="/application/sources/vid/footage5.mp4" type="video/mp4" />
        </video> -->
    	<div class="container">
        	<div class="row" style="padding-top:30px">
            	<div class="col-sm-6 col-md-6 col-lg-6">
                	<div class="panel panel-default" style="border-radius:0">
                    	<div class="panel-body">
                        	<h4>Create a Deal</h4>
                            <form action="<? echo base_url().uri_string(); ?>" class="form-horizontal" method="post">
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Restaurant Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="provider" placeholder="Name of Restaurant">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="description" placeholder="Description of Deal">
                                </div>
                              </div>
                              <div class="form-group">
                              	<label class="col-sm-3 control-label">Type</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="type" placeholder="Type of Food (i.e. mexican, chinese, italian, etc.)">
                                </div>
                              </div>
                              <div class="form-group">
                              	<label class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="address" placeholder="Your Restaurant's Address">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label">City / State</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="city" placeholder="City">
                                </div>
                                <div class="col-sm-4">
                                	<select class="form-control" name="state">
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA" selected>California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District Of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Zip</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="zip" placeholder="Zip Code">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Tags</label>
                                <div class="col-sm-8">
                                	<textarea class="form-control" rows="5" name="tags" placeholder="Tag your deal with relevant keywords"></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                	<input type="submit" class="btn btn-block btn-success btn-main-color" name="create_deal" value="Create Deal">
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <? //include 'application/views/include/footer.php'; ?>
    
    <? include 'application/views/include/script.php'; ?>
    
  </body>
</html>