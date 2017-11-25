<nav class="navbar navbar-default" data-toggle="tooltip" data-placement="top" title="Copyright &copy;2017 | Succesfull Garden" 
  style="margin-bottom:0px;">
  <div style="color: white" align="Center">
      <h4>&copy;2017 Succesfull Garden</h4> 
      <p>
        &nbsp <i class="glyphicon glyphicon-home"></i>&nbsp Jl. Raya Makrampai No 04, Sambas - Kalbar &nbsp|
        &nbsp <i class="glyphicon glyphicon-time"></i>&nbsp Senin-Minggu : 07.00-17.30 WIB &nbsp| 
        &nbsp <i class="glyphicon glyphicon-earphone"></i>&nbsp +62 821 1234 5627 &nbsp | 
        &nbsp <i class="glyphicon glyphicon-envelope"></i> <a href="mailto:succesfullgarden@gmail.com">&nbsp succesfullgarden@gmail.com</a>
      </p>
  </div>
  <style type='text/css' scoped='scoped'>
    #BounceToTop{position:fixed; bottom:0px; right:3px; cursor:pointer;display:none}
  </style>
  <div id='BounceToTop'>
    <img alt='Back to top' style="height: 80px; width:80px;" src='images/up_arrow.png'/>
  </div> 
</nav>

</body>

<?php
 include 'validator.php';
?>

<script> 
  function detailsmodal(kode_brg){
    var data = {"kode_brg" : kode_brg};
      jQuery.ajax({
        url : '/program/modal_detailsproduk.php',
        // url : '/program/tes - details barang.php',
        method : "post",
        data : data,
        success : function(data){
          jQuery('body').append(data);
          jQuery('#details-modal').modal('toggle');
        },
        error : function(){
          alert("ada kesalahan");
        }   
      });
  }
</script>

<script type='text/javascript'>
$(function() { $(window).scroll(function() { if($(this).scrollTop()>100) { $('#BounceToTop').slideDown(200); } else { $('#BounceToTop').slideUp(300); } });
$('#BounceToTop').click(function() { $('body,html').animate({scrollTop:0},800) .animate({scrollTop:25},200) .animate({scrollTop:0},150) .animate({scrollTop:10},100) .animate({scrollTop:0},50); }); });
</script>

<script>
  function showResultBiaya(str1) {
    if (str1.length==0) { 
      document.getElementById("service1").innerHTML="";
      return;
    }
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==1){
      document.getElementById("service1").innerHTML='<div class="text-center"><i class="fa fa-cog fa-spinner fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>';
    }
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("service1").innerHTML=xmlhttp.responseText;
    }
  }
    xmlhttp.open("GET","ajax/ajax_service.php?q="+str1,true);
    xmlhttp.send();
  }
</script>


<!-- <script id="cid0020000145201531000" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 200px;height: 300px;">{"handle":"succesfullgarden","arch":"js","styles":{"a":"000000","b":100,"c":"FFFFFF","d":"FFFFFF","k":"000000","l":"000000","m":"000000","n":"FFFFFF","p":"10","q":"000000","r":100,"pos":"br","cv":1,"cvfnt":"Verdana, Geneva, sans-serif, sans-serif","cvbg":"000000","cvw":200,"cvh":30,"surl":0,"ticker":1,"fwtickm":1}}
</script>
 -->
 
<!--  <script id="cid0020000172018009268" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 326px;height: 342px;">{"handle":"sucessfullgarden","arch":"js","styles":{"a":"33ccff","b":100,"c":"000000","d":"000000","k":"33ccff","l":"33ccff","m":"33ccff","p":"10","q":"33ccff","r":100,"pos":"br","cv":1,"cvfnt":"Calibri, Candara, Segoe, 'Segoe UI', Optima, Arial, sans-serif, sans-serif","cvbg":"33ccff","cvfg":"000000","cvw":250,"cvh":35,"ticker":1,"fwtickm":1}}</script> -->

<!-- </body></html> -->