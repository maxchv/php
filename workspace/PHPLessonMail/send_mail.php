<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" role="form" class="form-horizontal">
	<div class="form-group">
		<label class="control-label col-sm-2" for="from">From</label>
		<div class="col-sm-10">
			<input type="email" required="required" name="from" id="from" class="form-control" readonly="readonly" value="maxshaptala@gmail.com" /> 
		</div>		
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="to">To</label>
		<div class="col-sm-10">
			<input type="email" required="required" name="to" id="to" class="form-control" /> 
		</div>		
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="to">Subject</label>
		<div class="col-sm-10">
			<input type="text" required="required" name="subject" id="subject" class="form-control" /> 
		</div>		
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="to">Message</label>
		<div class="col-sm-10">
			<textarea required="required" name="message" id="message" class="form-control" rows="8"></textarea> 
		</div>		
	</div>
	<div class="col-sm-2 col-sm-offset-10 col-xs-4 col-xs-offset-8">
		<input type="submit" class="form-control btn btn-default" value="Send message" />
	</div>
</form>

<?php 

	$filters = [
		'to' 		=> FILTER_SANITIZE_EMAIL,
		'from'		=> FILTER_SANITIZE_EMAIL,
		'subject' 	=> FILTER_SANITIZE_STRING,
		'message'	=> FILTER_SANITIZE_STRING
	];

	if($data = filter_input_array(INPUT_POST, $filters)) {
		extract($data);		
		
		$headers = [];
		$headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-type: text/html; charset=utf-8";
		$headers[] = "From: max <$from>";
	  	
		mail($to, $subject, $message, join("\r\n", $headers));
	}