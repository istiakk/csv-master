<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>istiak : Home</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/logo.png"/>
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css"/> 
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css"/>  
     <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="assets/style.css" rel="stylesheet">

    <!-- Fonts -->
    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Raleway for Title -->
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!-- Pacifico for 404 page   -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
 <section id="menu-area">
    <nav class="navbar navbar-default main-navbar" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->                                               
           <a class="navbar-brand logo" href="index.html"></a>                      
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav main-nav menu-scroll">
            <li class="active"><a href="index.php">Home</a></li>
          </ul>                            
        </div><!--/.nav-collapse -->
<!--       <div class="search-area">
          <form action="">
            <input id="search" name="search" type="text" placeholder="What're you looking for ?">
            <input id="search_submit" value="Rechercher" type="submit">
          </form>
        </div>         -->
      </div>          
    </nav> 
  </section>
    
    
<?php 
//echo '<pre>';
//print_r($csv);

$n_array = array();
for($i=0;$i<sizeof($csv);$i++){
    foreach ($csv[$i] as $key => $value)
    {
        $a_key = explode(',', $key);
        $a_value = explode(',', $value);
        array_push($n_array, $a_value);
    }
}

$data = array();
for($i = 0; $i< sizeof($n_array); $i++)
{
     $k = 0;
     foreach ($n_array[$i] as $key => $value)
     {
         $data[$i][$a_key[$k]] = $value;   
         $k++;
     }
}
//print_r($data);
//exit;

$no_of_colum = sizeof($data);

$k_array = array();
for($i=0;$i<sizeof($data);$i++){
   // print_r($a[$i]);
    foreach ($data[$i] as $key => $value)
    {
            array_push($k_array, $key);
    }
    $no = sizeof($data[$i]);
    break;
}
$no_of_field = sizeof($k_array);
//print_r($n_array);
?>

    
<section id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Start welcome area -->
          <div class="welcome-area">
               
            <div class="welcome-content col-md-offset-1">
                <div class="col-md-4">
                  <div class="single-wc-content wow fadeInUp">
                    <span class="wc-icon"><?php echo $no_of_colum; ?></span>
                    <h4>Number Of Rows</h4>
                  </div>
                </div>
               
                <div class="col-md-4">
                 <div class="single-wc-content wow fadeInUp">
                    <span class="wc-icon"><?php echo $no_of_field?></span>
                    <h4>Number of colum</h4>
                  </div>
                </div>
                
                <form method="post" action="index.php?export">
                    <div class="col-md-4">
                    <div class="single-wc-content wow fadeInUp">
                        <?php
                            $data1=serialize($data); 
                            echo '<input type="hidden" name="h_array" value="'. htmlentities($data1). '">';
                        ?>
                        <input type="submit" class="btn btn-success wc-icon" value="Export">                    
                     </div>
                   </div>
                </form>
               
            </div>
          </div>
          <!-- End welcome area -->
        </div>
      </div>
    
    </div>
  </section> 
    
<section id="about">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
              <hr>
              <h1>File Content</h1>
                  <?php
                echo '<pre>';
                print_r($data);
                    ?>
          </div>    
      </div>    
     </div>    
</section>

    
    <!-- initialize jQuery Library --> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- Slick Slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
  <!-- mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>
  <!-- Wow animation -->
  <script type="text/javascript" src="assets/js/wow.js"></script> 

  <!-- Custom js -->
  <script type="text/javascript" src="assets/js/custom.js"></script>
</body>
</html>
