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
require_once 'commonheader.php';
    require_once 'admin/Product.php';
    $subcategory=new Product();
    $id=$_REQUEST['id'];
    $data=$subcategory->show_category();
    $subcategoryname=$subcategory->getcategoryname($id);
    
    $product=$subcategory->getProduct($id);
    echo '<pre>';
    print_r($product);
    echo'</pre>';
    // $subcategory=new Product();
    // $data=$subcategory->show_category();
   ?>
<link rel="stylesheet" href="css/swipebox.css">
            <script src="js/jquery.swipebox.min.js"></script> 
                <script type="text/javascript">
                    jQuery(function($) {
                        $(".swipebox").swipebox();
                    });
                </script>
<!--script-->
</head>
<body>
    <!---header--->
    <?php require_once 'commonnavfile.php';
  
   
    ?>

    <!---header--->
        <!---singleblog--->
                <div class="content">
                    <div class="linux-section">
                        <div class="container">
                            <div class="linux-grids">
                                <div class="col-md-8 linux-grid">
                                <ul>
                                <?php 
                                $html='';
                                while ($row = mysqli_fetch_array($subcategoryname)) {
                                    $html='<h2>'.$row['prod_name'].'</h2>';
                                
                                echo $html;
                                echo $row['html'];
                                }
                                ?>
                                
                                
                                
                                    
                                </ul>
                                    <a href="#detail" >view plans</a>
                                </div>
                                <div class="col-md-4 linux-grid1">
                                    <img src="images/linux.png" 
                                    class="img-responsive" alt=""/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-prices">
                        <div class="container">
                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
                                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
                                    </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                        <div class="linux-prices">
                                            <?php
                                            $html='';
                                            for($i=0;$i<count($product);$i++){
                                                $html.='<div class="col-md-3 linux-price">
                                                <div class="linux-top">
                                                    <h4>'.$product[$i]['product_name'].'</h4>
                                                </div>
                                                <div class="linux-bottom">
                                                    <h5>$'.$product[$i]['mon_price'].' <span class="month">per month</span></h5>
                                                    <h5>$'.$product[$i]['annual_price'].' <span class="month">per Annual</span></h5>
                                                    <h6>Single Domain</h6>
                                                    <ul>
                                                    <li><strong>WebSpace</strong> '.$product[$i]['webspace'].'</li>
                                                    <li><strong>Bandwidth</strong> '.$product[$i]['Bandwidth'].'</li>
                                                    <li><strong>Freedomain</strong>'.$product[$i]['freedomain'].'</li>
                                                    <li><strong>Language_tech </strong> '.$product[$i]['language_tech'].'</li>
                                                    <li><strong>mailboxe</strong> '.$product[$i]['mailbox'].'</li>
                                                    </ul>
                                                </div>
                                                <a href="#">buy now</a>
                                            </div>';
                                            }
                                            echo $html;
                                           
                                            ?>
                                            
                                            
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
       <!-- clients -->
                    <div class="whatdo">
                        <div class="container">
                            <h3>Linux Features</h3>
                            <div class="what-grids">
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-cog"
                                     aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-dashboard" 
                                    aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                       
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-stats"
                                     aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="what-grids">
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-download-alt"
                                     aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-move" 
                                    aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 what-grid">
                                    <div class="what-left">
                                    <i class="glyphicon glyphicon-screenshot"
                                     aria-hidden="true"></i>
                                    </div>
                                    <div class="what-right">
                                        <h4>Expert Web Design</h4>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
            <!---footer--->
            <?php require_once 'footer.php';?>
            
            
</body>
</html>