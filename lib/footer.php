<div class="row kt-container" style="margin-top:300px;"></div>

<nav class="navbar navbar-expand-md navbar-dark bg-white fixed-bottom" style="min-height: 56px;position: fixed;z-index: 999;bottom: 0;left: 0;right: 0;background: #FFFFFF;display: flex;align-items: center;justify-content: center;border-top: 1px solid #E1E1E1;padding-left: 4px;padding-right: 4px;padding-bottom: env(safe-area-inset-bottom);-webkit-box-shadow: 0px -5px 17px -8px rgba(0,0,0,0.43); -moz-box-shadow: 0px -5px 17px -8px rgba(0,0,0,0.43); box-shadow: 0px -5px 17px -8px rgba(0,0,0,0.43);">
            <div class="icon-bar">
              <a class="active" href="<?php echo $config['web']['url'] ?>"><i class="fa fa-home" style="font-size: 20px; color: #154ac2;"></i><br><strong style="font-size:10px;">Beranda</strong></a> 
              <a class="active" href="<?php echo $config['web']['url'] ?>history/order"><i class="fa fa-shopping-cart" style="font-size: 20px; color: #154ac2;"></i><br><strong style="font-size:10px;">Pesanan</strong></a> 
              <a class="active" href="<?php echo $config['web']['url'] ?>deposit-balance/"><i class="fa fa-plus-circle" style="font-size: 20px; color: #154ac2;"></i><br><strong style="font-size:10px;">Isi Saldo</strong></a> 
              <a class="active" href="<?php echo $config['web']['url'] ?>history/deposit"><i class="fa fa-credit-card" style="font-size: 20px; color: #154ac2;"></i><br><strong style="font-size:10px;">Riwayat</strong></a> 
              <a class="active" href="<?php echo $config['web']['url'] ?>page/profile"><i class="fa fa-user" style="font-size: 20px; color: #154ac2;"></i><br><strong style="font-size:10px;">Akun</strong></a> 
            </div>
        </nav>
		<!-- End Body Content -->
		<!-- Global Config (global config for global JS sciprts) -->
		<script>
            var KTAppOptions = {"colors":{"state":{"brand":"#366cf3","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
		</script>
		<!-- End Global Config -->

		<!-- Global Theme Bundle (used by all pages) -->
		<script src="<?php echo $config['web']['url'] ?>assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/js/scripts.bundle.js" type="text/javascript"></script>
		<!-- End Global Theme Bundle -->

		<!-- Page Vendors (used by this page) -->
		<script src="<?php echo $config['web']['url'] ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
		<!-- End Page Vendors -->

		<!-- Page Scripts (used by this page) -->
		<script src="<?php echo $config['web']['url'] ?>assets/js/pages/components/charts/line-chart/morris.min.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/js/pages/components/charts/raphael/raphael-min.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/js/pages/custom/chat/chat.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/js/pages/custom/voucher/theme.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/js/pages/custom/voucher/clipboard.min.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/js/pages/custom/wizard/wizard-4.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/js/pages/custom/contacts/list-columns.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/js/pages/crud/datatables/basic/basic.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/js/pages/components/extended/bootstrap-notify.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/js/pages/dashboard.js" type="text/javascript"></script>
		<script src="<?php echo $config['web']['url'] ?>assets/js/pages/custom/user/profile.js" type="text/javascript"></script>
		<!-- End Page Scripts -->
		

		</body>

</html>

        <script>
            $('#news').modal('show');
            function read_news() {
              $.ajax({
                type: "GET",
                url: "<?php echo $config['web']['url'] ?>ajax/read-news.php"
              });
            }
             function empty(e) {
		      switch (e) {
		        case "":
		        case 0:
		        case "0":
		        case null:
		        case false:
		        case typeof(e) == "undefined":
		          return true;
		        default:
		          return false;
		      }
		    }
		    function show_xpanel(class_){
		      $('.'+class_).show();
		    }
		    function hide_xpanel(class_){
		      $('.'+class_).hide();
		    }
		    function eC(str){
				var ciphertext = CryptoJS.AES.encrypt(str, '979a218e0632df2935317f98d47956c7');
				var bytes = CryptoJS.AES.decrypt(ciphertext.toString(), '979a218e0632df2935317f98d47956c7');
				var plaintext = bytes.toString(CryptoJS.enc.Utf8);

				return bytes;
			}
			function dC(str){
				var ciphertext = CryptoJS.AES.encrypt(str, '979a218e0632df2935317f98d47956c7');
				var bytes = CryptoJS.AES.decrypt(ciphertext.toString(), '979a218e0632df2935317f98d47956c7');
				var plaintext = bytes.toString(CryptoJS.enc.Utf8);

				return plaintext;
			}
			var format = function(num){
		      var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
		      if(str.indexOf(".") > 0) {
		        parts = str.split(".");
		        str = parts[0];
		      }
		      str = str.split("").reverse();
		      for(var j = 0, len = str.length; j < len; j++) {
		        if(str[j] != ",") {
		          output.push(str[j]);
		          if(i%3 == 0 && j < (len - 1)) {
		            output.push(",");
		          }
		          i++;
		        }
		      }
		      formatted = output.reverse().join("");
		      return("Rp. " + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
		    };
        </script>