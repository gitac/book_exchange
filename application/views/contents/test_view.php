<html> 

    <head>
        <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">  
        <script src="<?php echo base_url() ?>assets/js/jquery.js" type="text/javascript"></script>   
        <script src="<?php echo base_url() ?>assets/js/bootstrap.js" type="text/javascript"></script> 
    </head>

    <body>

        <div id="modal" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h2>Lorem Ipsum</h2>
	</div>	
	<div class="modal-body">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
		Donec placerat sem ipsum, ut faucibus nulla. Nullam mattis volutpat
		dolor, eu porta magna facilisis ut. In ultricies, purus sed pellentesque 
		mollis, nibh tortor semper elit, eget rutrum purus nulla id quam.</p>
	</div>
</div>

        <button class="my-button">click</button>
        <a href="#modal" role="button" class="btn" data-toggle="modal">Click Me</a> 

    </body>

</html>