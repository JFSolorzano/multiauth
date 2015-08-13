<!DOCTYPE html>
<html>
    <head>
        <title>Creolestudios</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" type="text/javascript"></script>

        <style>
            html, body {
                height: 100%;
            }
            .dataTables_filter{
                text-align: right;
                
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 700;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            .form_class{
                width: 50%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="container">

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet  light">
            <div class="portlet-title">
                <div class="caption">
                <i class="icon-users font-green-sharp"></i>
                <h1 style="font-weight: 700;">Registered Users</h1>
                    <a href="{{ URL::to('/admin/logout') }}"><button type="button" class="btn btn-default btn-md">Logout</button></a>
                </div>  
                <div class="inputs">
                    <div class="portlet-input input-inline input-large">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
<!--                            <input type="text" class="form-control input-circle" id="coach_search" placeholder="Search...">                            -->
                        </div>
                    </div>
                    <div class="portlet-input input-inline input-small">
                        <div class="input-icon right" style="text-align:right"> 
                        </div>
                    </div>
                </div>              
            </div>
            <div class="portlet-body">            	
                <div class="">
                	<!--table-scrollable-->
                    <table class="table table-bordered" id="tbl_user">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>User Type</th>                      
                                <th>Details</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
        </div>
    </body>
</html>
<script>
$(document).ready(function(){

	var oTable = $('#tbl_user').dataTable({
		    "processing": false,
		    "serverSide": true,
		    "ajax": "<?php echo action('Usercontroller@getUserlistadmin' );?>",
		    "bFilter": true,
			"bLengthChange": false,
		    "language": {
		        "emptyTable":"No User(s) available.",
		        "search": "",
				"sProcessing": "<i class='fa fa-2x fa-spin fa-refresh'></i>"
		    },
			"columns": [
		        {"data": "first_name", "width": "15%"},		     
		        {"data": "email_address", "width": "15%"},
		        {"data": "last_name","width": "15%"},	
		        {"data": "detail", "width": "5%", 'class': "alignCenter", 'sorting': false}
		    ],
		    
		});
            $("#coach_search").keyup( function (e) 
	{				
		if (e.keyCode == 13) 
		{					
			oTable.fnFilter( this.value );
		}				
	});

});
</script>