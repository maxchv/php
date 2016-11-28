<h2>AJAX</h2>
<p><abbr title="Asynchrotous Javascript and XML">AJAX</abbr> - технология
обращения к серверу без перегрузки страниц</p>

<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="city" class="col-sm-1 control-label">
			City
		</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="city" id="city" list="cities"/> 
			<datalist id="cities"></datalist>
		</div>
		<input type="submit" value="Send" class="btn btn-default col-sm-offset-1 col-sm-2" />
	</div>
</form>

<script type="text/javascript">
	// js
	var js = function() {
		var datalist = document.getElementById('cities');

		HTMLElement.prototype.deleteChilds = function() {
			while(this.children.length) {
				this.removeChild(this.firstElementChild);
			}
		}
		
		document.getElementById('city').addEventListener('keyup', function(event){
			console.log(event.key);

			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if(xhr.status = 200 && xhr.readyState == 4) {
					var cities = JSON.parse(xhr.responseText);
					//console.dir(cities);
					datalist.deleteChilds();
					for(let num in cities) {
						let opt = document.createElement('option');
						opt.appendChild(document.createTextNode(cities[num]['0']));
						datalist.appendChild(opt);
					}					
				}
			}
			xhr.open('GET', "cities.php?city="+this.value, true);
			xhr.send();			
		});
	};
	js();
	// jQuery
	(function() {
		$("#city").keyup(function() {
			$.getJSON('cities.php?city='+$(this).val(), function(data) {
				$('#cities').empty();
				$.each(data, function(key, val) {
					var opt = $('<option>').text(val['0']);
					opt.appendTo('#cities');
				});
			});
		});
	});
</script>
