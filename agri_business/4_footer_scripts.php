<!-- Vendor JS -->
   
    <script src="assets/js/vendors.js"></script>
    
	<!-- Active JS -->
	<script src="assets/js/active.js"></script>
	 <script src="assets/js/validate.js"></script>
 
<!--   search box start-->
    <script src="ajax/jquery.min.js"></script>
    <script src="ajax/typeahead.min.js"></script>


    <script type="text/javascript">
    $(document).ready(function(){        
    $('input.typeahead').typeahead({            
        name: 'typeahead',
        remote:'ajax/search_product.php?key=%QUERY',
        limit : 10
    });
    });
    </script>
    <!--   search box end-->