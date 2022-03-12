<?php
/******************************************
* Filename    : footer.php
* Proggrammer : Robi Naufal Kaosar
* Date        : 2020-04-02
* E-Mail      : robinaufal11@upi.edu
* Deskripsi   : Footer umum website
*
******************************************/
 ?>
   <footer class="footer">
     <div class="container">
       <div class="row">

         <div class="col-lg-3 col-md-6 col-xs-12">
           <div class="widget clearfix">
             <div class="widget-title">
                 <h3>Social</h3>
               </div>
               <ul class="footer-links social-md">
                 <li><a class="fb btn-a" title="Facebook" data-tippy-animation="scale" href="https://web.facebook.com/kesiswaan.cianjur"><i class="fa fa-facebook"></i></a></li>
                 <li><a class="dr btn-a" title="Instagram" data-tippy-animation="scale" href="https://www.instagram.com/man1cianjur/"><i class="fa fa-instagram"></i> </a></li>
                 <li><a class="pi btn-a" title="YouTube" data-tippy-animation="scale" href="https://www.youtube.com/channel/UCpge8_DjSkdFaXV2K1XEBhw/videos"><i class="fa fa-youtube"></i> </a></li>
                 <!-- <li><a class="gi btn-a" title="Github" data-tippy-animation="scale" href="#"><i class="fa fa-github"></i> </a></li>
                 <li><a class="tw btn-a" title="Twitter" data-tippy-animation="scale" href="#"><i class="fa fa-twitter"></i> </a></li>
                 <li><a class="dr btn-a" title="Dribbble" data-tippy-animation="scale" href="#"><i class="fa fa-dribbble"></i> </a></li>
                 <li><a class="pi btn-a" title="Pinterest" data-tippy-animation="scale" href="#"><i class="fa fa-pinterest"></i> </a></li> -->
               </ul><!-- end links -->
             </div><!-- end clearfix -->
           </div><!-- end col -->

           <div class="col-lg-3 col-md-6 col-xs-12">
             <div class="widget clearfix">
               <div class="widget-title">
                 <h3>Contact Details</h3>
               </div>

               <ul class="footer-links">
                 <li><a href="mailto:admin_ppdb@mansatucianjur.sch.id">admin_ppdb@mansatucianjur.sch.id</a></li>
                 <li>Jl.Pangeran Hidayatullah No.39</li>
                 <li>0857-9399-7484</li>
               </ul><!-- end links -->
             </div><!-- end clearfix -->
           </div><!-- end col -->


         </div><!-- end row -->
       </div><!-- end container -->
     </footer><!-- end footer -->

     <div class="copyrights">
       <div class="container">
         <div class="footer-distributed">
           <div class="footer-left">
             <p class="footer-company-name">Aplikasi PPDB &copy; <?=Date("Y")?><a href="#">MAN 1 Cianjur</a>
              <!-- <br>Design By : <a href="https://www.instagram.com/robinaufal11/">robinaufal11</a> -->
             </p>
           </div>
         </div>
       </div><!-- end container -->
     </div><!-- end copyrights -->

     <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
     <!-- Moment timeago -->
     <script src="<?=base_url();?>assets/js/moment-with-locales.js"></script>

     <!-- ALL JS FILES -->
     <script src="<?=base_url();?>assets/js/all.js"></script>
     
     <!-- ALL PLUGINS -->
     <script src="<?=base_url();?>assets/js/tippy.all.min.js"></script>
     <script src="<?=base_url();?>assets/js/custom.js"></script>

     <script src="<?=base_url();?>assets/js/jquery.ba-cond.min.js"></script>
     <script src="<?=base_url();?>assets/js/jquery.slitslider.js"></script>

     <!-- datepicker script -->
     <script src="<?=base_url();?>assets/js/bootstrap-datepicker.js"></script>
     <script src="<?=base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
     <script src="<?=base_url();?>assets/locales/bootstrap-datepicker.id.min.js"></script>

     <!-- Summernote -->
     <script src="<?=base_url();?>assets/summernote/summernote.min.js" charset="utf-8"></script>
     <script type="text/javascript">
     $(document).ready(function() {
       var Page = (function() {

         var $nav = $( '#nav-dots > span' ),
         slitslider = $( '#slider' ).slitslider( {
           autoplay: true,
           interval: 5000,
           onBeforeChange : function( slide, pos ) {

             $nav.removeClass( 'nav-dot-current' );
             $nav.eq( pos ).addClass( 'nav-dot-current' );

           }
         } ),

         init = function() {

           initEvents();

         },
         initEvents = function() {

           $nav.each( function( i ) {

             $( this ).on( 'click', function( event ) {

               var $dot = $( this );

               if( !slitslider.isActive() ) {

                 $nav.removeClass( 'nav-dot-current' );
                 $dot.addClass( 'nav-dot-current' );

               }

               slitslider.jump( i + 1 );
               return false;

             } );

           } );

         };

         return { init : init };

       })();

       Page.init();

     });

     $(function () {
       // Summernote
       $('.textarea').summernote()
     })

     tippy('.btn-a')
     $('#tanggal_lahir input').datepicker({
       format: "dd/mm/yyyy",
       language: "id"
     });

     function maintenance(){
       alert('Maaf saat ini fitur tersebut belum tersedia.');
     }

     function expired_signup(){
       alert('Maaf pendaftaran sudah ditutup pada tanggal 1 Juli 2020.');
     }
   </script>
 </body>
 </html>
