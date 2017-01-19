<!DOCTYPE html>
<html>
<head>
	<title>basic(39) VueJs</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<h3>page 39</h3>
	<h3>Home work (6.5)</h3>
	<div id="filter-homework">
		<ul>
			<li v-for="people in peoples">
				@{{people.name}}
			</li>
		</ul>

		<h3>Old peoples are</h3>
		
		<ul>
			<li v-for="people in old_peoples">
				@{{people.name}}
			</li>
		</ul>
	</div>

	<h3>(6) Filter Searching</h3>
	<div id="filter-search">
		<ul>
			<li v-for="story in storiesBy('John')">
				@{{story.plot}} SAID BY<b> @{{story.writer}} </b>
			</li>
		</ul>
		<input v-model="query" class="form-control">
		<h3>Search results:</h3>
		<ul class="list-group">
			<li v-for="story in search"
			class="list-group-item"
			>
			@{{ story.writer }} said "@{{ story.plot }}"
			</li>
		</ul>
	</div>
	<br>
	(1) Simple Compute: 
	<div id="basic_computed">
		a = @{{a}} , b = @{{b}}
	</div>
	(2) Another Compute: 
	<div id="compute_plus">
		<h4>Enter 2 numbers to calculate their sum.</h4>
		<form class="form-inline">
			<input v-model.number="a" class="form-control">
			+
			<input v-model.number="b" class="form-control">
		</form>
		<h4>Result: @{{a}} + @{{b}} = @{{c}}</h4>
	</div>
	(3)Sort test case
	<div id="test_case">
		<ul>
			<li v-for="item in itemss">
				@{{ item.name }}
			</li>
		</ul>
	</div>
	(4)Filter Example
	<div id="div-filter-1">
		<h1>Let's hear some stories!</h1>
			<div>
				<h3>Alex's stories</h3>
				<ul class="list-group">
					<li v-for="storyy in storiesBy('Alex')"
					class="list-group-item"
					>
					@{{ storyy.writer }} said "@{{ storyy.plot }}"
					</li>
				</ul>
				<h3>John's stories</h3>
				<ul class="list-group">
					<li v-for="story in storiesBy('John')"
					class="list-group-item"
					>
					@{{ story.writer }} said "@{{ story.plot }}" number @{{story.upvotes}}
					</li>
				</ul>
			</div>
	</div>
	(5) 
	<div id="filter-famous-history">
		<h1>Let's hear some famous stories! (@{{famous.length}})</h1>
		<div>
			<ul>
				<li v-for="story in famous">
					@{{story.port}} .. @{{story.writer}} .. @{{story.rating}}
				</li>
			</ul>
		</div>
	</div>	

	<script src="{{URL::asset('resources/assets/js/Vue.js')}}"></script>
	<script type="text/javascript">
		// ### Filter HomeWork 6.5 ###
		new Vue({
			el: "#filter-homework",
			data:{
				peoples: [
					{
						name: "sakib",
						age: 25
					},
					{
						name: "Mamshed",
						age: 30
					},
					{
						name: "Sagir",
						age: 45
					},
					{
						name: "Muktadir",
						age: 15
					},
					{
						name: "Arup",
						age: 05
					},
					{
						name: "Khaled",
						age: 55
					},
					{
						name: "Mahtab",
						age: 28
					}
				],
			},
			computed:{
				old_peoples: function(){
					return this.peoples.filter(function(people_age){

						return people_age.age > 40;
					})
				}
			}
		});
		//	### 06 ###
		new Vue({
			el: "#filter-search",
			data:{
				stories: [
					{
					plot: "I crashed my car today!",
					writer: "Alex",
					upvotes: 28
					},
					{
					plot: "Yesterday, someone stole my bag!",
					writer: "John",
					upvotes: 38
					},
					{
					plot: "Someone ate my chocolate...",
					writer: "John",
					upvotes: 18
					},
					{
					plot: "I ate someone's chocolate!",
					writer: "Alex",
					upvotes: 8
					},
				],
				query: '',
			},
			methods: {
				storiesBy: function (writer) {
					return this.stories.filter(function (story) {
						return story.writer === writer
					})
				},
			},
			computed: {
				search: function () {
					var query = this.query
					return this.stories.filter(function (story) {
						return story.plot.includes(query)
					})
				}
			}
		});

		//### 01 ###
		new Vue({
			el: "#basic_computed",
			data:{
				a: 5,
				b: '',
			},
			computed:{
				b: function(){
					return this.a + 1;
				}
			}
		});

		//### 02 ###
		new Vue({
			el: "#compute_plus",
			data:{
				a: 1,
				b: 2
			},
			computed:{
				c: function(){
					return this.a+this.b;
				}
			}
		});

		//### 03 ###
		new Vue({
			el: "#test_case",
			data:{
				items: [
				  { name: 'Edward', value: 20 },
				  { name: 'Sharpe', value: 30 },
				  { name: 'And', value: 40 },
				  { name: 'The', value: -10 },
				  { name: 'Magnetic', value: 10 },
				  { name: 'Zeros', value: 30 }
				]
			},
			computed:{
				itemss: function(){
					return this.items.sort(function (a, b){
						if (a.value > b.value) {
							return 1;
						}
						if (a.value < b.value) {
							return -1;
						}
						// a must be equal to b
							return 0;
					});
				}
			}
		});

		//### 04 ###
		new Vue({
			el: "#div-filter-1",
			data: {
				stories: [
					{
					plot: "I crashed my car today!",
					writer: "Alex",
					upvotes: 28
					},
					{
					plot: "Yesterday, someone stole my bag!",
					writer: "John",
					upvotes: 38
					},
					{
					plot: "Someone ate my chocolate...",
					writer: "John",
					upvotes: 18
					},
					{
					plot: "I ate someone's chocolate!",
					writer: "Alex",
					upvotes: 8
					},
				]	
			},
			methods:
			{
				// a method which filters the stories depending on the writter
				storiesBy: function (){
					return this.stories.filter(function(item){
						return item.upvotes > 20
					})
				},
			}
		});

		// #### 05 ###

		new Vue({
			el: "#filter-famous-history",
			data:{
				tess: 'testiiii',
				stories:[
					{
						port: "hunki dunki 01",
						writer: 'Allex',
						rating: 34
					},
					{
						port: 'Danki dunki 02',
						writer: 'Dunki',
						rating: 30
					},
					{
						port: 'punki panki 03',
						writer: 'dual',
						rating: 45
					},
					{
						port: 'tanta tan tan 04',
						writer: 'Alex',
						rating: 38
					}
				],
			},
			computed:{
				famous: function() {
					return this.stories.filter(function(item){
						return item.rating > 30;
					});
				}
			}
		});
	</script>
</body>
</html>