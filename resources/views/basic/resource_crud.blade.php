<!DOCTYPE html>
<html>
<head>
	<title>Resource CRUD</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div class="col-md-4">
		<div id="fetch_data">
			@{{msg}}
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.js"></script>

	<script type="text/javascript">
		var token = $('meta[name="csrf-token"]').attr('content');
		
		Vue.http.interceptors.push((request, next) => {
			    request.headers.set('X-CSRF-TOKEN', token);

			    next();
			});

		new Vue({
			el: "#fetch_data",
			data:{
				msg: 'testing',
				stories: []
			},
			mounted: function() {
				// GET request
				this.$http({url: 'api/users', method: 'GET'})
				.then(function (response){
					//Vue.set(vm, 'stories', response.data)
					// Or we as we did before
					this.stories = response.data
				}.bind(this))
			},
			methods:{
				update: function(story){

					story.upvote++;
					this.$http.patch("{{URL::asset('resource_crud')}}/"+story.id , story)
				},

				deleteData: function(story){

					this.$http.delete("{{URL::asset('resource_crud')}}/"+story.id)
				}
			}
		});

	</script>
</body>
</html>
