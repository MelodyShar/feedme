<div id="nav">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<? echo base_url(); ?>"><b><img id="logo" src="/application/sources/img/logo.svg">Feedme</b></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<!-- Left Navigation -->
      	<li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<? echo base_url(); ?>"></a></li>
            </ul>
      	</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<!-- Right Navigation -->
        <li><a href="<? echo base_url().'create'; ?>">Create Your Deal</a></li>
      </ul>
    </div>
  </div>
</div>