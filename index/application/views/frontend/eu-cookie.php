
<style>
  .cookieConsentContainer {
  z-index: 999;
  width: 100%;
  box-sizing: border-box;
  padding: 10px 10px 10px 10px;
  background: #460052;
  overflow: hidden;
  position: fixed;
  bottom: 0px;
  right: 0px;
  display: none;
}
.cookieConsentContainer .cookieTitle a {
  font-family: OpenSans, arial, "sans-serif";
  color: #FFFFFF;
  font-size: 22px;
  line-height: 20px;
  display: block;
}
.cookieConsentContainer .cookieDesc p {
  margin: 0;
  padding: 0;
  font-family: OpenSans, arial, "sans-serif";
  color: #FFFFFF;
  font-size: 13px;
  line-height: 20px;
  display: block;
  margin-top: 10px;
} .cookieConsentContainer .cookieDesc a {
  font-family: OpenSans, arial, "sans-serif";
  color: #FFFFFF;
  text-decoration: underline;
}
.cookieConsentContainer .cookieButton a {
  display: inline-block;
  font-family: OpenSans, arial, "sans-serif";
  color: #fff;
  font-size: 14px;
  font-weight: bold;
  margin-top: 14px;
  background: #014ddb;
  box-sizing: border-box; 
  padding: 12px 20px;
  text-align: center;
  transition: background 0.3s;
  float: right;
}
.cookieConsentContainer .cookieButton a:hover { 
  cursor: pointer;
  background: #4d8022;
  color: #fff;
}
.link-cookie-policy{
  opacity: .6;
}
.link-cookie-policy:hover {
  opacity: .8;
}

@media (max-width: 980px) {
  .cookieConsentContainer {
    bottom: 0px !important;
    left: 0px !important;
    width: 100%  !important;
  }
}
</style>

<div class="cookieConsentContainer" id="cookieConsentContainer" style="opacity: .9; display: block; display: none;">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-6">
      <div class="cookieDesc">
        <p>
          <?php echo get_frontend_settings('cookie_note');?>
          <a class="link-cookie-policy" href="<?php echo site_url('home/cookie_policy'); ?>"><?php echo get_phrase('cookie_policy'); ?></a>
        </p>
      </div>
    </div>
    <div class="col-md-2">
      <div class="cookieButton">
        <a onclick="cookieAccept();"><?php echo get_phrase('accept'); ?></a>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    if (localStorage.getItem("accept_cookie_atlas")) {
      //localStorage.removeItem("accept_cookie_atlas");
    }else{
      $('#cookieConsentContainer').fadeIn(1000);
    }
  });

  function cookieAccept() {
    if (typeof(Storage) !== "undefined") {
      localStorage.setItem("accept_cookie_atlas", true);
      localStorage.setItem("accept_cookie_time_atlas", "<?php echo date('m/d/Y'); ?>");
      $('#cookieConsentContainer').fadeOut(1200);
    }
  }
</script>