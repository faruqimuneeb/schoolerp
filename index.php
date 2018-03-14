<?php
include("common.php");
error_reporting(1);

$response= registerglobal('college_id','username','password','usertype','Login_x','Login_y','emsg','location_id');

$html_obj = new html_form();

$colleges_arr1[0] = " -- Select -- ";

if(isset($Login_x) || isset($Login_y) || isset($_POST['Login'])) {


	if($username==""){$error['username']="Enter User Name";}
	if($password==""){$error['password']="Enter Password";}
	
	if(count($error)==0){
		
		
		if($usertype=='student'){	
		
		
		    $sel_user = "SELECT * FROM es_preadmission WHERE pre_student_username='".$username."' AND pre_student_password='".$password."' AND status!='inactive'";
			
			
			$std_records = sqlnumber($sel_user);
			if($std_records>0){
				$student_info = getarrayassoc($sel_user);				
				
				if (is_array( $student_info) && count( $student_info) > 0){
					    $_SESSION['eschools']['user_school']  = $college_id;
						$_SESSION['eschools']['user_name']  = $student_info['pre_student_username']; 
						$_SESSION['eschools']['user_id']    = $student_info['es_preadmissionid'];
						$_SESSION['eschools']['login_type'] = $usertype;
						$_SESSION['eschools']['user_theme'] = $student_info['es_user_theme'];
						$finance_info = getarrayassoc("SELECT * FROM es_finance_master ORDER BY es_finance_masterid DESC LIMIT 0,1");
						$_SESSION['eschools']['currency']   = $finance_info['fi_symbol'];
						$_SESSION['eschools']['schoollogo'] = $finance_info['fi_school_logo'];
						$_SESSION['eschools']['schoolname'] = $finance_info['fi_schoolname'];
						
						$_SESSION['eschools']['from_acad']      = $finance_info['fi_ac_startdate'];
			            $_SESSION['eschools']['to_acad']        = $finance_info['fi_ac_enddate'];
			            $_SESSION['eschools']['from_finance']   = $finance_info['fi_startdate'];
			            $_SESSION['eschools']['to_finance']     = $finance_info['fi_enddate'];
						header("location:student_staff/index.php?pid=2&action=viewprofile");
				}
			}else{
			    $username="";
				$password="";
				header("location:?emsg=15");
				exit;
			}
		}
		if($usertype=='staff'){
			$sel_user = "SELECT * FROM es_staff WHERE st_username='".$username."' AND st_password='".$password."' AND status='added' AND selstatus='accepted' AND tcstatus='notissued'";
			$staff_records = sqlnumber($sel_user);
			if($staff_records>0){
				$staff_info = getarrayassoc($sel_user);
				
				if (is_array( $staff_info) && count( $staff_info) > 0){
					$_SESSION['eschools']['user_school']    = $college_id;
					$_SESSION['eschools']['user_name']      = $staff_info['st_username'];
					$_SESSION['eschools']['user_id']        = $staff_info['es_staffid'];
					$_SESSION['eschools']['st_postaplied']  = $staff_info['st_post'];
					$_SESSION['eschools']['login_type']     = $usertype;
					$_SESSION['eschools']['user_theme']     = $staff_info['st_theme'];
					
					$finance_info = getarrayassoc("SELECT * FROM es_finance_master ORDER BY es_finance_masterid DESC LIMIT 0,1");
					
					$_SESSION['eschools']['currency']   = $finance_info['fi_symbol'];
					$_SESSION['eschools']['schoollogo'] = $finance_info['fi_school_logo'];
					$_SESSION['eschools']['schoolname'] = $finance_info['fi_schoolname'];
					$_SESSION['eschools']['from_acad']      = $finance_info['fi_ac_startdate'];
			        $_SESSION['eschools']['to_acad']        = $finance_info['fi_ac_enddate'];
			        $_SESSION['eschools']['from_finance']   = $finance_info['fi_startdate'];
			        $_SESSION['eschools']['to_finance']     = $finance_info['fi_enddate'];
					header("location:student_staff/index.php?pid=16&action=viewprofile");
				   }
					
			}else{
			    $username="";
				$password="";
				header("location:?emsg=15");
				exit;
			}
		}
		if($usertype=='admin'){
			$sel_admin = "SELECT * FROM es_admins WHERE admin_username='".$username."' AND admin_password='".$password."'";
			$admin_records = sqlnumber($sel_admin);
			if($admin_records>0){
				$admin_info = getarrayassoc($sel_admin);
				
				if (is_array( $admin_info) && count( $admin_info) > 0){
					
					$_SESSION['eschools']['user_school']= $college_id;
					$_SESSION['eschools']['admin_user'] = $admin_info['admin_username'];			
					$_SESSION['eschools']['admin_id']   = $admin_info['es_adminsid'];
					$_SESSION['eschools']['user_type']  = $usertype;
					if($admin_info['user_type']=='super'){
					$_SESSION['eschools']['superadmin_email'] = $admin_info['admin_email'];
					}
					$_SESSION['eschools']['user_theme'] = $admin_info['user_theme'];
					
					$compdetails  = getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");
					$_SESSION['eschools']['currency']       = $compdetails['fi_symbol'];
					$_SESSION['eschools']['schoollogo']     = $compdetails['fi_school_logo'];
					$_SESSION['eschools']['schoolname'] 	= stripslashes($compdetails['fi_schoolname']);
					$_SESSION['eschools']['from_acad']      = $compdetails['fi_ac_startdate'];
					$_SESSION['eschools']['to_acad']        = $compdetails['fi_ac_enddate'];
					$_SESSION['eschools']['from_finance']   = $compdetails['fi_startdate'];
					$_SESSION['eschools']['to_finance']     = $compdetails['fi_enddate'];
					$_SESSION['eschools']['es_finance_masterid']  = $compdetails['es_finance_masterid'];
					
					
					/*array_print($_SESSION);
					exit;*/
					
					header("location:office_admin/?pid=44");
				   }
					
			}else{
			    $username="";
				$password="";
				header("location:?emsg=15");
				exit;
			}
		}
	}
}

include("includes/seoheader.php");		
?>
<body class="login">
<script type="text/javascript">
function GetXmlHttpObject(handler)
		{
			var objXmlHttp=null
		
			if (navigator.userAgent.indexOf("Opera")>=0)
			{
				alert("This Site doesn't work in Opera")
				return
			}
			if (navigator.userAgent.indexOf("MSIE")>=0)
			{
				var strName="Msxml2.XMLHTTP"
				if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
				{
					strName="Microsoft.XMLHTTP"
				}
				try
				{
					objXmlHttp=new ActiveXObject(strName)
					objXmlHttp.onreadystatechange=handler
					return objXmlHttp
				}
				catch(e)
				{
					alert("Error. Scripting for ActiveX might be disabled")
					return
				}
			}
			if (navigator.userAgent.indexOf("Mozilla")>=0)
			{
				objXmlHttp=new XMLHttpRequest()
				objXmlHttp.onload=handler
				objXmlHttp.onerror=handler
				return objXmlHttp
			}
		}

function getallcolleges(countryid,getselected)
		{   
			
			url="admin/getajaxdata_front.php?cid="+countryid+"&selval="+getselected;
			url=url+"&sid="+Math.random();
			xmlHttp3=GetXmlHttpObject(countryChangedtwo);
			xmlHttp3.open("GET", url, true);
			xmlHttp3.send(null);
		}
		
		function countryChangedtwo()
		{
			if (xmlHttp3.readyState==4 || xmlHttp3.readyState=="complete")
			{
				document.getElementById("subject2selectbox").innerHTML=xmlHttp3.responseText
			}
		}
</script>

<div class="logo">
    <a href="index.html">
       <?php if($college_header_info['fi_school_logo']!=""){ echo thumbimage("office_admin/images/school_logo/".$college_header_info['fi_school_logo'],'100'); } ?>
    </a>
</div>
<div class="form-title text-center">
    <span class="form-title"><h3 style="color: white;">Welcome</h3></span>
    <span class="form-title"><h2><?php if($college_header_info['fi_schoolname']!=""){ echo $college_header_info['fi_schoolname']; } ?></h2></span>
</div>
<div class="content">
	<!-- BEGIN LOGIN FORM -->
            <form class="login-form" method="post">
                <?php if(isset($emsg) && $emsg!=""){
                	if($emsg==16){
                		$alert = "alert alert-success";
                	}
                	else{
                		$alert = "alert alert-danger";
                	}
                	?>
                <div class="<?php echo $alert; ?>">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $sucessmessage[$emsg]; ?> </span>
                </div>
                <?php }else{   ?>
					<div class="alert alert-info">
	                    <span>Enter User Name and Password to continue </span>
	                </div>
                <?php
                } ?>
                <div class="form-group" >
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>

                    <?php echo $html_obj->draw_inputfield('username',$username,'','class="form-control form-control-solid placeholder-no-fix" style="background-color: white;"');?>
                </div>
                <?php
                	if(isset($error['username'])){
                		?>
                		<div class="alert alert-danger">
                			<span><?php echo $error['username'];?></span>
                		</div>
                		<?php
                	}
                ?>
                <div class="form-group" >
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>

                    <?php echo $html_obj->draw_inputfield('password','','password','class="form-control form-control-solid placeholder-no-fix" style="background-color: white;"');?>
                </div>
                <?php
                	if(isset($error['username'])){
                		?>
                		<div class="alert alert-danger">
                			<span><?php echo $error['password'];?></span>
                		</div>
                		<?php
                	}
                ?>
                <div class="form-group">
				    <label>User Type</label>
				    <div class="mt-radio-inline">
				        <label class="mt-radio col-md-3">
				            <input type="radio" name="usertype" value="admin" checked="checked">Admin
				            <span></span>
				        </label>
				        <label class="mt-radio col-md-3">
				            <input type="radio" name="usertype" value="student" <?php if($usertype=='student'){echo"checked='checked'";}?>>Student
				            <span></span>
				        </label>
				        <label class="mt-radio col-md-3">
				            <input type="radio" name="usertype" value="staff" <?php if($usertype=='staff'){echo"checked='checked'";}?>>Staff
				            <span></span>
				        </label>
				    </div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn red btn-block uppercase" name="Login">Login</button>
                </div>
            </form>
</div>
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>
