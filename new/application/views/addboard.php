<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>โมเดลกระดาษ</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="<?=url::base()?>assets/css/bootstrap.css" rel="stylesheet">
<link href="<?=url::base()?>assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?=url::base()?>assets/css/docs.css" rel="stylesheet">
<link href="<?=url::base()?>assets/js/google-code-prettify/prettify.css"
	rel="stylesheet">
<script src="<?=url::base()?>assets/js/jquery.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-transition.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-alert.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-modal.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-dropdown.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-scrollspy.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-tab.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-tooltip.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-popover.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-button.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-collapse.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-carousel.js"></script>
	<script src="<?=url::base()?>assets/js/bootstrap-typeahead.js"></script>

<style type="text/css">
<!--
body {
	background-color: #FFECCE;
}
.style1 {
	font-size: 16px;
	font-weight: bold;
}
.style2 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
	<script type="text/javascript" src="<?=url::base()?>myEditer/Editer.js"></script>
          <script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas()});
</script>
<script>
function emoticon(what)
{
	//document.addboard.comment.value = document.addboard.elements.comment.value+" "+what;
	//document.getElementById('detail').value=document.getElementById('detail').value+"<IMG src='"+what+"' width=40 height=40>"
	document.getElementById('data').innerHTML=document.getElementById('data').innerHTML+"<IMG src='"+what+"' width=40 height=40>";
	//document.getElementById("area1").value=document.getElementById("area1").value+""+what;
	//bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //alert(document.getElementById('detail').value);
  
}
</script>
</head>
<body>
<div id="main">
  <div id="middle">
  <form action="<?=url::base()?>board/saveadd"  method="post" enctype="multipart/form-data">
    <div align="center">
      <table width="396" border="0" cellpadding="0" cellspacing="0">
       
        <tr>
          <td width="425" colspan="3"><table width="49%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><div align="center" class="style1">สร้างกระทู้</div></td>
              </tr>
            <tr>
              <td><div align="left"><span class="style2">เรื่อง</span></div></td>
              </tr>
            <tr>
              <td><div align="left">
                <input name="name" id="name" type="text" size="62"   style="width: 710px"/>
              </div>                <div align="left"></div></td>
              </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="left"> 
                <textarea name="detail" id="detail"   style="width: 710px" cols="90" rows="10"  ><span id="data" style="font-size:13px"></span></textarea>
              </div></td>
              </tr>
         
            <tr>
              <td><div align="left">
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0003.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0003.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0004.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0004.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0005.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0005.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0006.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0006.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0007.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0007.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0008.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0008.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0009.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0009.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0011.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0011.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0012.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0012.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0013.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0013.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0015.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0015.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0017.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0017.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0018.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0018.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0019.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0019.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0020.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0020.gif')" style="cursor:pointer" />
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0021.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0021.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0023.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0023.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0024.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0024.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0025.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0025.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0026.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0026.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0027.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0027.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0030.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0030.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0031.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0031.gif')" style="cursor:pointer" />
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0034.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0034.gif')" style="cursor:pointer" />
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0035.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0035.gif')" style="cursor:pointer" />
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0036.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0036.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0037.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0037.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0038.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0038.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0039.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0039.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0040.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0040.gif')" style="cursor:pointer" />
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0042.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0042.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0043.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0043.gif')" style="cursor:pointer" />
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0045.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0045.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0046.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0046.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0047.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0047.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0048.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0048.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0041.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0041.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0050.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0050.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0051.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0051.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0052.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0052.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0053.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0053.gif')" style="cursor:pointer" />
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0054.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0054.gif')" style="cursor:pointer" /> 
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0055.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0055.gif')" style="cursor:pointer" />
                <img src="<?=url::base()?>model/emo/yenta4-emoticon-0056.gif" width="30" height="30" onclick="emoticon('<?=url::base()?>model/emo/yenta4-emoticon-0056.gif')" style="cursor:pointer" />
              </div></td>
              </tr>
            <tr>
              <td><div align="center">
                <input type="submit" name="Submit" value="ตั้งกระทู้"  class="btn btn btn-warning btn btn-warning"  />
                <input type="button" name="Submit2" value="ยกเลิก"  class="btn"   onclick="javascript:parent.$.fancybox.close()" />
              </div></td>
              </tr>
          </table>
            <label></label></td>
          </tr>
      </table>
    </div>
    </form>
  </div>
</div>
</body>
</html>


