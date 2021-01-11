@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head><title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('files/images/icons/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('files/images/icons/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('files/images/icons/favicon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('files/images/images/icons/favicon-114x114.png')}}">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="{{asset('files/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('files/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('files/vendors/bootstrap/css/bootstrap.min.css')}}">
    <!--LOADING STYLESHEET FOR PAGE-->
    <link type="text/css" rel="stylesheet" href="{{asset('files/vendors/intro.js/introjs.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('files/vendors/calendar/zabuto_calendar.min.css')}}">
    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="{{asset('files/vendors/animate.css/animate.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('files/vendors/jquery-pace/pace.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('files/vendors/iCheck/skins/all.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('files/vendors/jquery-news-ticker/jquery.news-ticker.css')}}">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="{{asset('files/css/themes/style3/pink-blue.css')}}" id="theme-change" class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="{{asset('files/css/style-responsive.css')}}">
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
    
    <style type="text/css">
    div.form-horizontal .radio, .form-horizontal .checkbox {
    min-height: 27px;
    margin-left: 18px;
          }
          .roles {
    float: right;
    width: 532px;
    display: inline-flex;
}
div.form-horizontal .radio, .form-horizontal .checkbox {
    min-height: 27px;
    margin-left: 32px;
}
</style>

</head>
<body>
<div>
  <!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP--><!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar hidden-print">
        <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" data-intro="&lt;b&gt;Topbar&lt;/b&gt; has other styles with live demo. Go to &lt;b&gt;Layouts-&gt;Header&amp;Topbar&lt;/b&gt; and check it out." class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="index.html" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">Dashboard</span><span style="display: none" class="logo-text-icon">Dashboard</span></a></div>
            <div class="topbar-main "><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                
            
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    
                        
                    </span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                           
                     @php 
                     @endphp
                                

                    @php 
                    @endphp
                                
                            </span></a></li>
                            <li class="divider"></li>
                            <li> <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>
                   
                </ul>
            </div>
        </nav>
        <!--BEGIN MODAL CONFIG PORTLET-->
        <div id="modal-config" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        <h4 class="modal-title">Modal title</h4></div>
                        <div class="modal-body"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend et nisl eget porta. Curabitur elementum sem molestie nisl varius, eget tempus odio molestie. Nunc vehicula sem arcu, eu pulvinar neque cursus ac. Aliquam ultricies lobortis magna et aliquam. Vestibulum egestas eu urna sed ultricies. Nullam pulvinar dolor vitae quam dictum
                        condimentum. Integer a sodales elit, eu pulvinar leo. Nunc nec aliquam nisi, a mollis neque. Ut vel felis quis tellus hendrerit placerat. Vivamus vel nisl non magna feugiat dignissim sed ut nibh. Nulla elementum, est a pretium hendrerit, arcu risus luctus augue, mattis aliquet orci ligula eget massa. Sed ut ultricies felis.</p></div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL CONFIG PORTLET--></div>
    <!--END TOPBAR-->
    <div  id="wrapper"><!--BEGIN SIDEBAR MENU-->
        <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
            <div  class="sidebar-collapse menu-scroll hidden-print">
                <ul id="side-menu" class="nav">
                    <li class="user-panel">
                      </p>
                          
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                            <!-- </ul> -->
                        </div>
                    </li>
                   


                     <span class="menu-title">Company</span><span class="fa arrow"></span></a>
                    
                        
                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('company') }}"><i class="fa fa-columns"></i><span class="submenu-title">Add Company</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('companieslist') }}"><i class="fa fa-columns"></i><span class="submenu-title">View Companies</span></a></li>
                        </ul>
                    </li>
                     <li><a href="#"><i class="fa fa-th-list fa-fw">
                        <div class="icon-bg bg-violet"></div>
                    </i><span class="menu-title">Brand</span><span class="fa arrow"></span></a>
                    
                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('brand') }}"><i class="fa fa-columns"></i><span class="submenu-title">Add Brand</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('brandslist') }}"><i class="fa fa-columns"></i><span class="submenu-title">View Brands</span></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-th-list fa-fw">
                        <div class="icon-bg bg-violet"></div>
                    </i><span class="menu-title">Product</span><span class="fa arrow"></span></a>
                    
                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('product') }}"><i class="fa fa-columns"></i><span class="submenu-title">Add Product</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('productslist') }}"><i class="fa fa-columns"></i><span class="submenu-title">View Products</span></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-th-list fa-fw">
                        <div class="icon-bg bg-violet"></div>
                    </i><span class="menu-title">Record</span><span class="fa arrow"></span></a>
                    
                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('record') }}"><i class="fa fa-columns"></i><span class="submenu-title">Add Record</span></a></li>
                        </ul>

                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('recordslist') }}"><i class="fa fa-columns"></i><span class="submenu-title">View Records</span></a></li>
                        </ul>
                    </li>  
                </ul>
            </div>
        </nav>
        <!--END SIDEBAR MENU-->

        
       
        
</div>


</body>
</html>