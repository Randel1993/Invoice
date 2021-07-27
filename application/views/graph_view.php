<?php $this->load->view('templates/header');?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top header-bg-dark" style="background: ##FFFFFF!;">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="/Invoice"><h1>ABC Hardware Store</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/Invoice/">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php print site_url();?>auth/logout">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h1>
                    <button type="button" id="yearly" class="btn btn-primary btn-lg">YEARLY</button>
                    <button type="button" id="monthly" class="btn btn-primary btn-lg">MONTHLY</button>
                    <button type="button" id="daily" class="btn btn-primary btn-lg">DAILY</button>
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="chart-container" style="position: relative; height:40vh; width:95vw">
    <canvas id="myChart"></canvas>
</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js'?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js" integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/graph.js'?>"></script>
</body>
</html>
