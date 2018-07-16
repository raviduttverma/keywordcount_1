<?php header('Access-Control-Allow-Origin: *'); ?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<!-- <script src="public/js/jquery/jquery.min.js"></script> -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<!--End Sweet Alert-->
<head>
    <title>Welcome</title>
</head>
<body>
<div class="container-fluid fee_plan_course" style="margin:20px;">
<h3 style="margin-top:0px;">Welcome <?php echo $this->session->userdata('User_name')?></h3>
<ul class="nav navbar-nav navbar-right">
    <li><button class="btn btn-primary" style="margin-right:15px; margin-bottom:15px;"><a href="<?php echo base_url()?>Login/logout" style="color:#fff;">Logout</a></button></li>
</ul>
<div class="row">
   <div class="col-md-2"><label>Eneter Keyword: </label></div><div class="col-md-2"><input id="keywords" type="text" placeholder="Type Keyword here"></div>
   <div class="col-md-2"><dutton type="button" onclick="submitKeyword();" class="btn btn-warning">Submit</button></div>
</div>
<div lass="row">
    <div class="col-md-5"><h3>Most 5 Keywords</h3>
        <table id="schooltable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="50%">
			<thead id="Head">
				<tr>
                    <th>Keyword</th>
                    <th>Count</th>
				</tr>
			</thead>
			<tbody id="mostkeywordsbody">
				
			</tbody>
		</table>
    </div>
	<div class="col-md-5"><h3>Last 5 Keywords Entered by You..</h3>
        <table id="schooltable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="50%">
			<thead id="userkeywordsHead">
				<tr>
                    <th>Keyword</th>
                    <th>Date</th>
				</tr>
			</thead>
			<tbody id="userkeywordsbody">
				
			</tbody>
		</table>
    </div>
</div>

<script type="text/javascript">
function submitKeyword(){
    var keyword=$('#keywords').val();
    var n = keyword.length;
    if(keyword!="" && n<=5){
        $.ajax({
            type:'post',
            url:'Home/InsertKeywords',
            data:{keyword:keyword },
            success: function(res){
                if(res=1){
                    swal("Submitted", "Your Keyword is Submitted to database", "success");
                    setTimeout(
                        function()
                        {
                            location.reload();
                        },
                        2000
                    );
                    

                }else{
                    swal("Opps..!", "Did not Submitted", "error");
                }
            }
        });
    }else{
        swal("error", "keyword must be less than 5 characters", "error");
    }
    
}
PutDataToTables();
function PutDataToTables(){
    $.ajax({
        type:'GET',
        dataType:'JSON',
        url:'Home/Getkeywords',
        success: function(data){
            var dataForUser=data[0];
            var dataForAll=data[1];
            var strAll="";
            var strUser="";
            for(var i=0; i<dataForAll.length; i++){
                strAll+='<tr><td>'+dataForAll[i].Keyword+'</td><td>'+dataForAll[i].Key_Count+'</td></tr>'
            }
            $('#mostkeywordsbody').html(strAll);
            for(var i=0; i<dataForUser.length; i++){
                strUser+='<tr><td>'+dataForUser[i].Keyword+'</td><td>'+dataForUser[i].Entered_On+'</td></tr>'
            }
            $('#userkeywordsbody').html(strUser);
        }
    });
}
</script>

