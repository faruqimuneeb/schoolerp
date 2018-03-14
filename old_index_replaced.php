
<table  width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="1002" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6" align="left" valign="bottom"><img src="images/m1.gif" alt="" width="6" height="10" /></td>
        <td width="990" class="ww2">&nbsp;</td>
        <td width="6" align="right" valign="bottom"><img src="images/m3.gif" alt="" width="6" height="10" /></td>
      </tr>
      <tr>
        <td height="489" class="cc4">&nbsp;</td>
        <td align="left" valign="top" class="bb_mid"><table width="100%" height="482" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="118" align="left" valign="top">
              <table width="100%" height="118" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="62%" height="118" align="right" valign="top" style="padding-left:25px;">
                    <table width="100%" height="92" border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                      
                        <td width="23%" height="92" align="left"><?php if($college_header_info['fi_school_logo']!=""){ echo thumbimage("office_admin/images/school_logo/".$college_header_info['fi_school_logo'],'100'); } ?></td>
                        <td width="77%" height="92" align="left" class="school_header_font"><?php if($college_header_info['fi_schoolname']!=""){ echo $college_header_info['fi_schoolname']; } ?></td>
                      </tr>
                  </table></td>
                  <td width="38%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="67">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="43" align="right" valign="bottom"><?php include("includes/topmenu.php");?></td>
                      </tr>
                  </table></td>
                </tr>
            </table>
          </td>
          </tr>
          <tr>
            <td height="328" align="left" valign="top" style="padding-top:20px;">
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="35" class="heading"><span class="heading3">Login</span><span class="heading4"></span></td>
                </tr>
                <tr>
                  <td height="6" align="left" valign="top"><img src="images/line2.gif" alt="" width="596" height="1" /></td>
                </tr>
                <tr>
                  <td height="308" align="center" valign="top" style="background:#FFFFFF"><table width="850" height="336" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="598" height="336" align="left" valign="top" class="loginbg"><table width="100%" height="294" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="6%" height="33">&nbsp;</td>
                          <td width="94%" align="left" valign="middle" height="33"><table width="500" border="0">
  <tr>
    <td width="350" align="center" valign="top" class="success_message"><?php if(isset($emsg) && $emsg!=""){echo $sucessmessage[$emsg];}?></td>
  </tr>
  
   <tr>
    <td width="320" align="center" valign="top" class="success_message"></td>
  </tr>
</table>

						  
						  </td>
                        </tr>
                        <tr>
                          <td height="220">&nbsp;</td>
                          <td align="left" valign="top">
                           <form action="" method="post">
                          <table width="400" height="234" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="21" align="left" valign="middle" class="t1">&nbsp;</td>
                              <td height="21" align="left" valign="middle" class="t1">&nbsp;</td>
                              <td class="dot">&nbsp;</td>
                              <td align="left" valign="middle">&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="52" height="21" align="left" valign="middle" class="t1">&nbsp;</td>
                              <td width="105" height="21" align="left" valign="middle" class="t1">User Name</td>
                              <td width="4" class="dot">:</td>
                              <td width="239" align="left" valign="middle"><label>
                               <?php echo $html_obj->draw_inputfield('username',$username,'','class="txtbx"');?>
                              </label></td>
                            </tr>
                            <tr>
                              <td  height="10"align="left" valign="middle" class="t1">&nbsp;</td>
                              <td  height="10" align="left" valign="middle" class="t1">&nbsp;</td>
                              <td class="dot">&nbsp;</td>
                              <td align="left" valign="middle" class="t3"><?php echo $error['username'];?></td>
                            </tr>
                            <tr>
                              <td height="26" align="left" valign="middle" class="t1">&nbsp;</td>
                              <td height="26" align="left" valign="middle" class="t1">Password</td>
                              <td class="dot">:</td>
                              <td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('password','','password','class="txtbx"');?></td>
                            </tr>
                            <tr>
                              <td  height="10" colspan="2" align="right" valign="middle" class="t1">&nbsp;</td>
                              <td class="dot">&nbsp;</td>
                              <td align="left" valign="middle" class="t3"><?php echo $error['password'];?></td>
                            </tr>
                            <tr>
                              <td colspan="4" align="center" height="15" class="dot"><table width="232"  border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                  <td width="45" class="t1" align="right">Admin</td>
                                    <td width="20" align="center"><input type="radio" name="usertype" value="admin" checked="checked"></td>
                                    <td width="47" class="t1" align="right">Student</td>
                                    <td width="20" align="center"><input type="radio" name="usertype" value="student" <?php if($usertype=='student'){echo"checked='checked'";}?>></td>
                                    <td width="40" class="t1" align="right">Staff</td>
                                    <td width="20" align="center"><input type="radio" name="usertype" value="staff" <?php if($usertype=='staff'){echo"checked='checked'";}?>></td>
                                    
                                  </tr>
                              </table></td>
                            </tr>
                            
                            <tr>
                              <td height="15" colspan="3" class="t1">&nbsp;</td>
                              <td class="dot"><input type="image" src="images/login2.gif" name="Login" alt="Login" title="Login" width="55" height="25" /></td>
                            </tr>
                            
                            <tr>
                              <td height="24" colspan="4" align="left" valign="top">&nbsp;</td>
                            </tr>
                          </table>
                          </form>
                          </td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="center" valign="top"><?php include("includes/footer.php");?></td>
                </tr>
            </table>
            
          
            
            
          
            
            </td>
          </tr>
        </table>
          <!-- //////////////////////////////////////////////////////Here Start on to header inside////////////////////////////-->

      
        	</td>
        <td class="cc6">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><img src="images/m7.gif" alt="" width="6" height="13" /></td>
        <td class="ww8">&nbsp;</td>
        <td align="right" valign="top"><img src="images/m9.gif" alt="" width="6" height="13" /></td>
      </tr>
    </table></td>
  </tr>
</table> 