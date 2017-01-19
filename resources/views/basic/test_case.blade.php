<!DOCTYPE html>
<html>
<head>
	<title>Test case</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
	<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
</head>
<body>
	<form action="{{url('test_case')}}" method="POST" accept-charset="utf-8">
		{{ csrf_field() }}
		<div class="col-md-4">
			<select class="js-example-basic-multiple form-control" multiple="multiple" name="select_box_1[]">
			  <option value="AL">Alabama</option>
			  <option value="1">1Khandaker Ashiqur Rahman</option>
			  <option value="2">2Abu Ahmed Rohman Golam Faruk</option>
			  <option value="3">3Soiod Mohammad Abul Aktar</option>
			  <option value="4">4Wyoming4</option>
			  <option value="5">5Wyoming5</option>
			</select>
		</div>
		<div class="col-md-4">
			<label for="id_label_multiple">
	  			Click this to highlight the multiple select element

	  			<select class="js-example-basic-multiple js-states form-control" id="id_label_multiple" multiple="multiple" name="select_box_2">
	  				<option value="1">Alabama</option>
					<option value="2">Khandaker Ashiqur Rahman</option>
					<option value="3">Abu Ahmed Rohman Golam Faruk</option>
					<option value="4">Soiod Mohammad Abul Aktar</option>
					<option value="5">Wyoming4</option>
					<option value="6">Wyoming5</option>
	  			</select>
			</label>
		</div>

		<div class="form-group col-md-4">
            <input type="text" class="form-control rxtitle-autocomp" name="txtSearchMedName" id="txtSearchMedName" value="{{ (isset($searchOldInput['txtSearchMedName'])) ? $searchOldInput['txtSearchMedName'] : '' }}" placeholder="search by medicine name...">
        </div>

		<button type="submit" name="submit">Submit</button>
	</form>


	{{-- <script src="{{URL::asset('resources/assets/js/jquery.js')}}"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<script type="text/javascript">
		$(".js-example-basic-multiple").select2({
			//minimumResultsForSearch: Infinity;
		});

		$(document).ready(function(){

          var rxListForAutoComp = <?php echo $rxListForAutoComp; ?>;

          $(".rxtitle-autocomp").autocomplete({
              source: rxListForAutoComp
          });

      	});

	</script>
</body>
</html>