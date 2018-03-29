
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="login">   

  <div class="loginbox 2adpro_orange collectonme"> 
              <h3>&nbsp;</h3>               
                      <form action="#" method="get">                      
                      <div class="formarea ">
                        <span class="name"><h4>username</h4><input type="text" id="username" value="" name="username"></span>
                        <span class="name"><h4>password</h4><input type="password" id="password" value="" name="password"></span>
            <span id="submit">Sign in</span> 
            <!--<span class="forgot"><h5>Forgot your password?</h5></span>!-->
                        <span class="error" style="display:none"><span class="ico"><img src="images/error1.png"></span><img src="images/ico1.png">enter correct user id</span>
                        <span class="password" style="display:none"><span class="ico"><img src="images/error1.png"></span><img src="images/ico1.png">enter correct password</span>
                        </div>
                      </form> 
              </div>
  <div class="loginbox 2adpro_orange collectonme"> 
        <marquee scrolldelay="200" direction="up" style="width: 302px;height: 150px;margin: 38px 54px;color: aliceblue;">
        <div class="slide" style="width: 300px;height: auto;color:#2efd02;">
        <p style="margin: 0;">Our Vision</p>
        <span><ul><li style="color:#2efd02;"> "To be the creative hub of the flat world”</li></ul></span>        
        </div>
        <div class="slide" style="width: 300px;height: auto">
        <p style="margin: 0;">Our Mission</p>
        <span><ul><li style="color:#2efd02;">
      To offer our customers unmatched quality, creativity and design services utilizing our:
    </li><li style="color:#2efd02;">Design versatility across print, web, mobile/tablet, and social platforms</li>
        <li style="color:#2efd02;">Proprietary technology platform</li>
        <li style="color:#2efd02;">Best-in-class performance-driven metrics </li>
           </ul></span></div>
        <div class="slide" style="width: 300px;height: auto">
        <p style="margin: 0;">Our Values</p>
        <span><ul>
        <li style="color:#2efd02;">Learning</li>
        <li style="color:#2efd02;">Integrity</li>
        <li style="color:#2efd02;">Innovation</li>
        <li style="color:#2efd02;">Customer first</li>
        <li style="color:#2efd02;">Team Work</li>
        </ul>        
        </span>        
        </div></marquee>
        </div>
<script type="text/javascript">
function submitme(){
if($('#username').val()==""){$(".error").show();}else{$(".error").hide();}
if($('#password').val()==""){$(".password").show();}else{$(".password").hide();}
if($(".error:visible").length<1&&$(".password:visible").length<1){
$.ajax({type: "POST",url: "main.php",
data: {un:$('#username').val(),
up:$('#password').val()}
}).done(function( msg ){
if(msg.trim()==""){$(".error,.password").show();}
else{
  window.location='';
$('#strip').css("height",40);
$('#strip').html('<div style="padding: 0;font-size: 30px;margin: -2px auto;color: white;font-weight: bolder;width: 1000px;text-align: left;"><img src="images/logowhite.fw.png" /></div>');
var tmp = msg.split("$$$$$");
$('.header').html(tmp[0]);
$('#mainwrapper').html(tmp[1]);
$('.login').remove();}});}
}
$('.forgot').click(function(){$('.forgotps').show();});
$('#submit_for').click(function(){});
$('.forgotps #submit').click(function(){});
$('#submit').click(function(){submitme();});
$("input").keyup(function(event){if(event.keyCode == 13){submitme();}});</script>
</div>
</body>
</html>
