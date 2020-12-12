<?php
/**
 * The file doc comment
 * php version 7.2.10
 * 
 * @category Class
 * @package  Package
 * @author   Original Author <author@example.com>
 * @license  https://www.cedcoss.com cedcoss 
 * @link     link
 */
session_start();
if (!(isset($_SESSION['admin']))) {
    header('Location:../login.php');
}
require_once 'header.php';
require_once 'Product.php';
$product_category=new Product();
$data=$product_category->show_category();

?>

<body>
  <!-- Sidenav -->
    <?php require_once 'sidebar.php';?>
    <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Search form -->
        <form class="navbar-search navbar-search-light form-inline mr-sm-3"
        id="navbar-search-main">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative input-group-merge">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" 
            data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" 
              data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" 
              data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" 
              aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  
              dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have 
                  <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" 
                        src="assets/img/theme/team-1.jpg" 
                        class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between 
                        align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">
                            <?php echo ( isset($_SESSION['admin']))? 
                            $_SESSION['admin']['name']: ''; ?>
                            </h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">
                        Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" 
                        src="assets/img/theme/team-2.jpg" 
                        class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between 
                        align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">
                            <?php echo ( isset($_SESSION['admin']))
                            ?$_SESSION['admin']['name']:'';?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">
                        A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" 
                        src="assets/img/theme/team-3.jpg" 
                        class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between 
                        align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">
                            <?php echo ( isset($_SESSION['admin'])) ? 
                            $_SESSION['admin']['name']: ''; ?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" 
                        src="assets/img/theme/team-4.jpg" 
                        class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between 
                        align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"> 
                            <?php echo (isset($_SESSION['admin']))?
                            $_SESSION['admin']['name']:'';?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">
                        Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" 
                        src="assets/img/theme/team-5.jpg" 
                        class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between 
                        align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"> 
                            <?php echo ( isset($_SESSION['admin'])) 
                            ? $_SESSION['admin']['name']:'';?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">
                        A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" 
                class="dropdown-item text-center text-primary f
                ont-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link"
               href="#" role="button" data-toggle="dropdown" 
               aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg 
              dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar 
                    rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar 
                    rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar 
                    rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar 
                    rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar 
                    rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar 
                    rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" 
              role="button" data-toggle="dropdown" 
              aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="assets/img/icons/avtar.png">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">
                    <?php echo (isset($_SESSION['admin']))?
                    $_SESSION['admin']['name']:'';?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href='../logout.php' class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">View Product</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item">
                  <a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="index.php">Dashboards</a></li>
                  <li class="breadcrumb-item active" 
                  aria-current="page">View Product </li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
          <!-- Card stats -->
        
        </div>
      </div>
    </div>

    <!-- editform -->
    <div class="col-md-4">
      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <div class="card bg-secondary border-0 mb-0">
                <div class="card-header bg-transparent pb-5">
                  <div class="btn-wrapper text-center">
                    <h3 class="mb-0">Create New Product  </h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form id="produteditform">
                <h6 class="heading-small text-muted mb-4">Enter Product Details</h6>
              <div class="pl-lg-4">
                <div class="row">
                <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" 
                        for="input-username"> Select Product Category</label>
                        <span class='requirefield'>*</span>
                        <div class="input-group mb-3">
                          <select class="custom-select form-select " id="categeoryid">
                            <option value="0" selected>Please Select</option>
                            
                          </select>
                          <div class="invalid-feedback" id='categeoryidfield'> 
                              
                            </div>
                        </div>
                      </div>
                    </div>
               
                  <div class="col-lg-6">
                                  <div class="form-group">
                                <label class="form-control-label" for="input-email">
                                Enter Product Name</label><span class="requirefield">*</span>
                                <input type="text" id="productname" class="form-control" 
                                placeholder="enter product name" >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label"
                                for="input-first-name">Page URL</label>
                                <input type="text" id="pageurl" 
                                class="form-control" placeholder="enter page url"  >
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr class="my-4">
                        <h4 class="heading-small text-muted mb-4">
                        Product Description</h4>
                        <div class="pl-lg-4">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="form-control-label" >
                                Enter Monthly Price</label>
                                <span class="requirefield">*</span>
                                <input  class="form-control"
                                placeholder=" This would be Monthly Plan " id="monthprice" type="number" >
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label class="form-control-label" f
                                or="input-city"> Enter Annual Price </label>
                                <span class="requirefield">*</span>
                                <input type="number" id="annualmonth"
                                class="form-control"
                                placeholder="This would be Annual Price "  >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label class="form-control-label"
                                for="input-country">SKU</label>
                                <input type="text" id="sku" 
                                class="form-control" placeholder="SKU">
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr class="my-4">
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">Features </h6>
                        <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="form-control-label" >Web Space(in GB)</label>
                                <span class="requirefield">*</span>
                                <input  class="form-control" 
                                placeholder=" Enter 0.5 for 512 MB " id="webspace" type="text" >
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label class="form-control-label" for="input-city"> 
                                Bandwidth (in GB) </label>
                                <span class="requirefield">*</span>
                                <input type="text" id="Bandwidth" 
                                class="form-control" placeholder="Enter 0.5 for 512 MB  " 
                                >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="form-control-label" >Free Domain</label>
                                <span class="requirefield">*</span>
                                <input  class="form-control" id="freedomain"
                                placeholder=
                                " Enter 0 if no domain available in this service  " 
                                 type="text">
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label class="form-control-label"
                                for="input-city">Language/Technology Support</label>
                                <span class="requirefield">*</span>
                                <input type="text" id="language_tech" 
                                class="form-control" 
                                placeholder="Separate by (,) Ex:PHP, MySQL, MongoDB " value="New York" >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="form-control-label" >Mailbox </label>
                                <span class="requirefield">*</span>
                                <input  class="form-control"
                                placeholder=" Enter Number of mailbox 
                                will be provided, enter 0 if none  " id="mailbox" type="text" >
                              </div>
                            </div>
                          </div>
                          <div class="text-center">
                          <button type="button" id="createproduct"
                          class="btn btn-primary mt-4">Create Now</button>
                        </div>
                        </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

        <!-- table -->
        <div class="row mt--6">
        <div class="col-xl-12 ">
          <div class="card">
            <div class="table-responsive">
              <table class="table align-items-center table-flush prodtable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Category Id</th>
                    <th scope="col">Parent Id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Link</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Parent Id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Link</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                   
                
                  </tr>
                </thead>
                <tbody id='producttable'>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
<?php 
  require_once 'footer.php';?>    
  </div>
</body>

</html>