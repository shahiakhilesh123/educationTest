<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1" /><title>
	Self Drive Cars, Car Rentals / Hire , Car4hires
</title>
    <!-- Bootstrap -->
    <link href="{{ asset('public/asset/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/asset/css/admin-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/asset/css/admin-media.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('public/asset/Images/favicon.ico')}}" />
    <link href="{{ asset('public/asset/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" />  
    <script src="{{ asset('public/asset/js/1.12.4/jquery.min.js')}}"></script> 
    <!-- <script src="asset/js/bootstrap.min.js"></script>  -->
</head>
<body class="body">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<script src="{{ asset('public/asset/js/bootstrap.min.js')}}"></script>
<link href="{{ asset('public/asset/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{ asset('public/asset/css/custom_New.css')}}" rel="stylesheet" />
<link href="{{ asset('public/asset/css/media_New.css')}}" rel="stylesheet" />
<link href="{{ asset('public/asset/css/style_PPC.css')}}" rel="stylesheet" />
<link href="{{ asset('public/asset/css/custom2.css')}}" rel="stylesheet" />
<link href="{{ asset('public/asset/css/admin-style.css')}}" rel="stylesheet" />
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('public/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link href="public/asset/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />
<style>
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }
    .body .skiptranslate .VIpgJd-ZVi9od-ORHb-OEVmcd {
         display: none !important;
    }
    body {
        top: 0px !important;
    }
      .goog-logo-link{
        display:none !important;
      }
     .goog-te-gadget{
      color:transparent!important;
      }
      .goog-te-combo{
          color:black;
          border: none;
      }
      
      .currency {
        color:black;
        border: none;
        margin-left: 4px;
        margin-right: 4px;
        vertical-align: baseline;
        font-family: arial;
        font-size: 10pt;
      }
      

    .nav_link {
        text-decoration: none;
        background-color: white !important;
        color: black;
        border-color: white !important; 
    }
	
</style>

<nav class="navbar navbar-expand-md navbar-dark bg-dark sidebarNavigation" data-sidebarclass="navbar-dark bg-dark">
    <div class="container">
	<div class="log-logo">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://www.car4hires.com//images/carhireslogo.png" alt="Car4hires.com" class="center-block">
        </a>
		</div>
		
        <button class="navbar-toggler leftNavbarToggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
           
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
			
                
				
                 
                <li class="nav-item">
                    <a  class="nav_link">   
                    <?php $currencies =  \App\Http\Controllers\Model\BaseModelController::getCurrency();  
                    $currency_name  = isset($currency_name) ? ($currency_name) : 'USD';
                    //echo $currency_name;
                    ?>
                    <select class="currency" onchange="setCurrency(this.value)" style="width: 55px;">
                    <option selected><?php echo $currency_name; ?></option>
                   
                    <select>              
                    </a>
                </li>
                <li class="nav-item">
                     <a  class="nav_link goo" id="google_translate_element">                  
                    </a>
                </li>
		
				<li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home                   
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Contact Us</a>
                </li>
                @if (Route::has('login'))
                    @auth
                    <li id="wuc_Header_liSignup" class="sign">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li id="wuc_Header_liSignup" class="sign">
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    @endauth
                @endif
                <li id="wuc_Header_liSignup" class="sign">
                        <a href="{{ route('register') }}">Sign Up</a>
                </li>
            </ul>
             
        </div>
          
    </div>
</nav>
 


        
                                 @yield('content')
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- <script src="{{ asset('public/js/bootstrap.min.js')}}"></script> -->
        <script src="{{ asset('public/plugins/select2/js/select2.full.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<!-- Bootstrap 4 -->
<script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
    $('.datepicker').datepicker({
        format: 'd-M-yyyy',
        startDate: '-0d',
        autoclose: true
    });
    $('.datepicker').change(function(){
        $('.datepicker2').datepicker({
            format: 'd-M-yyyy',
            autoclose: true,
            startDate: new Date($('.datepicker').val())
        });
    })
    function setCurrency(currency) {
            $.ajax({
                url: "{{ url('/currency_set') }}/" + currency,
                cache: false,
                success: function(data) {
                    //if (data == true) {
                        location.reload();
                    //}
                }
            });
    }
</script>
</body>
</html>
