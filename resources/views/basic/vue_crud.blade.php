<!DOCTYPE html>
<html>
<head>
	<title>CRUD VueJs</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div class="col-md-4">
		<div id="fetch_data">
			<ul>
				<li v-for="story in stories">
					@{{ story.name }} === @{{ story.upvote }} 
					<button @click="update(story)" class="btn btn-xs btn-primary">Edit</button>
					<button @click="deleteData(story)" class="btn btn-xs btn-danger">Delete</button>
				</li>
			</ul>
		</div>
	</div>

	<script src="{{URL::asset('resources/assets/js/Vue.js')}}"></script>
	<script src="{{URL::asset('resources/assets/js/jquery.js')}}"></script>

	<script type="text/javascript">
		
		$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});

		new Vue({
			el: "#fetch_data",
			data:{
				msg: 'testing',
				stories: []
			},
			mounted: function(){
				$.get('api/users', function(data){
					this.stories = data;
				}.bind(this))
			},
			methods: {
				update: function(story){

					story.upvote++;
					//var story = 100;
					$.ajax({
						url: "{{URL::asset('crud_vue')}}/"+story.id,
						type: 'PATCH',
						data: {story:story},
					});
				},
				deleteData: function(story){

					//alert(story.id);
					var index = this.stories.indexOf(story);
					// delete it
					this.stories.splice(index, 1)

					$.ajax({
						url: "{{URL::asset('crud_vue')}}/"+story.id,
						type: 'DELETE',
					});
				}
			}
		});

	</script>
</body>
</html>
