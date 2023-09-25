<footer id="contact" class="footer">
    <div class="footer-wrapper">
      <section class="footer-top">
      </section>
      <section class="footer-colums">
        <section>
          <div class="des">
            <div class="logo-footer mb-3">
              <a href="#" title="logo">
                <img src="{{ asset('assets/img/pena.png')}}" class="footer-logo" alt="Laplace" />
              </a>
            </div>
            <p class="text-light">Tetap semangat dan jangan lupa bernafas.</p>
          </div>
        </section>
        <section>
          <ul>
            <h3>Sosial Media</h3>
            <span class="sosial-link">
              <a href="https://instagram.com/pena_stmikadhiguna" target="_blank" title="instagram">
                <i class="fa-brands fa-instagram fa-xl"></i>
              </a>
              <a href="https://web.facebook.com/penastmikadhiguna" target="_blank" title="facebook">
                <i class="fa-brands fa-facebook fa-xl"></i>
              </a>
              <a href="https://www.youtube.com/@penaofficial3731" target="_blank" title="youtube">
                <i class="fa-brands fa-youtube fa-xl"></i>
              </a>
            </span>
            <span class="#">
              <div class="wa-contact">
                <p class="text-light fw-semibold fs-5">Contact</p>
              </div>
              <a href="">
                <i class="fa-brands fa-whatsapp"></i>
              </a>
              <a id="footerContact" href="" target="_blank" style="text-decoration: underline;">Click</a>
            </span>
        </section>
        <section>
          <ul>
            <h3>Navigation</h3>
            <li>
              <a href="#home" title="Home">Home</a>
            </li>
            <li>
              <a href="#about" title="About">About</a>
            </li>
            <li>
              <a href="#event" title="Event">News</a>
            </li>
            <li>
              <a href="#galery" title="Galery">Galery</a>
            </li>
          </ul>
        </section>
      </section>
      <section class="footer-botom">
        <small>PENA <span class="year" id="year"></span>, all right reserved</small>
        <span class="footer-botom-links">
          <p id="footerDeskripsi" class="text-white"></p>
        </span>
      </section>
    </div>
  </footer>
<script>
$(document).ready(function(){
  $.ajax({
    url: `{{ url('v2/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/getbytitle/') }}/` +'<p>footerContact</p>',
    method: "GET",
    dataType: "json",
    success: function(response) {
        if (response.data) {
            var item = response.data;
            var footerContact= item.deskripsi.replace(/<[^>]+>/g, '');
            $("#footerContact").attr('href', `https://wa.me/${footerContact}?text=Hallo kak, mau tanya seputaran PENA dong...`);
        } 
    },
    error: function() {
      console.log("Failed to get data from the server");
    }
  });
});
</script>
<script>
$(document).ready(function(){
  $.ajax({
    url: `{{ url('v2/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/getbytitle/') }}/` +'<p>footerAlamat</p>',
    method: "GET",
    dataType: "json",
    success: function(response) {
        if (response.data) {
            var item = response.data;
            var footerDeskripsi= item.deskripsi.replace(/<[^>]+>/g, '');
            $("#footerDeskripsi")[0].innerText = footerDeskripsi;
        } 
    },
    error: function() {
      console.log("Failed to get data from the server");
    }
  });
});
</script>
