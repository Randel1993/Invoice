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
          <a class="nav-link" href="/Invoice/graph">Graph
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
                <h1>Invoice
                    <small>List</small>
                    <div class="float-right">
                      <a class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a>
                    </div>  
                </h1>
            </div>
             
            <table class="table table-striped" id="mydata" data-ordering="false"> 
                <thead>
                    <tr>
                        <th>Invoice Code</th>
                        <th>Customer id</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                     
                </tbody>
            </table>
        </div>
</div>
</div>

        <!-- MODAL ADD -->
          <form>
              <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Invoice</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group row">
                          <label class="col-md-2 col-form-label">Customer:</label>
                          <div class="col-md-10">
                          <select class="form-select" name="customer_id" id="customer_id">

                          </select>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        <!--END MODAL ADD-->

        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="invoice_code_delete" id="invoice_code_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->

        <!-- MODAL ORDER LIST -->
          <form>
              <div class="modal fade" id="Modal_Order_List" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <hi class="modal-title" id="exampleModalLabel">Invoice code: <span id="inv_code"></span></h5>
                    </div>
                    <div class="modal-body">
                      <div class="col-12">
                        <table class="table table-striped" id="order-list" data-ordering="false"> 
                          <thead>
                            <tr>
                            <th>Product Code</th>
                            <th>Quantity</th>
                            <th style="text-align: right;">Actions</th>
                            </tr>
                          </thead>
                          <tbody id="order_list">

                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" type="submit" id="btn_add_order" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Order">Add</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        <!--END MODAL ORDER LIST -->

        <!-- MODAL ORDER -->
          <form>
              <div class="modal fade" id="Modal_Order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <hi class="modal-title" id="exampleModalLabel">Add Order</h5>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" id="invoice_code_save" value="" />
                      <div class="form-group row">
                          <label class="col-md-2 col-form-label">Product code:</label>
                          <div class="col-md-10">
                            <select class="form-select" name="product_select" id="product_select"></select>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label">Quantity</label>
                        <div class="col-md-10">
                          <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Quantity">
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" type="submit" id="btn_save_order" class="btn btn-primary">Save</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        <!--END MODAL ORDER -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js'?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/index.js'?>"></script>
</body>
</html>