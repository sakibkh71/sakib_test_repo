<!DOCTYPE html>
<html>
<head>
	<title>basic VueJs</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<h3>page 1 to 38</h3>

	<div id="just_msg">
		(1) @{{msg}}	
	</div>

	(2) V-for:
	<div id="v_for_limit">
		<ul>
			<li v-for="i in 11" class="list-group-item">
				@{{ i-1 }} times 4 equals @{{ (i-1) * 4 }}.
			</li>
		</ul>
	</div>

	(3) Loop though an Array
	<div id="v_for_array">
		<ul>
			<li v-for="storie in stories" class="list-group-item">
				@{{ storie }}.
			</li>
		</ul>
	</div>

	(4) Loop though an Array Obj
	<div id="v_for_obj">
		<ul>
			<li v-for="(value, key, index) in stories" class="list-group-item">
				@{{ index }} -- @{{ value.name }}" -- "@{{ value.age }}.
			</li>
		</ul>
	</div>

	(5) UpVote :D
	<div id="upVote" @click="voteEvent">
		<button class="btn btn-success">UpVote (@{{vote}})</button>	
	</div>

	(6) simple calculator
	<div id="sim_cal">
		<h5>Type 2 numbers and choose operation.</h5>
		<form class="form-inline">
			<!-- Notice here the special modifier 'number'
			is passed in order to parse inputs as numbers.-->
			<input v-model.number="a" class="form-control">
			<select v-model="operator" class="form-control">
			<option>+</option>
			<option>-</option>
			<option>*</option>
			<option>/</option>
			</select>
			<!-- Notice here the special modifier 'number'
			is passed in order to parse inputs as numbers.-->
			<input v-model.number="b" class="form-control">
			<button type="submit" @click.prevent="calculate"
			class="btn btn-primary">
			Calculate
			</button>
		</form>

		<h5>Result: @{{a}} @{{operator}} @{{b}} = @{{c}}</h5>
	</div>

	{{-- <script src="https://unpkg.com/vue/dist/vue.js"></script> --}}
	<script src="{{URL::asset('resources/assets/js/Vue.js')}}"></script>

	<script type="text/javascript">
		new Vue({
			el: "#just_msg",
			data:{
				msg: "its a testing msg using vue",
				i: 1,
			},
		});

		new Vue({
			el: "#v_for_limit",
		});

		new Vue({
			el: "#v_for_array",
			data: {
				stories: [
				"I crashed my car today!",
				"Yesterday, someone stole my bag!",
				"Someone ate my chocolate...",
				]
			}
		});

		new Vue({
			el: "#v_for_obj",
			data: {
				//index: 0,
				stories: [
					{
						name: 'sakib',
						age: 78
					},
					{
						name: 'rakib',
						age: 89
					},
					{
						name: 'sumon',
						age: 90
					}
				]
			}
		});

		//###  5  ###
		new Vue({
			el: "#upVote",
			data:{
				vote: 0,
			},
			methods: {
				voteEvent: function(){
					this.vote++;
				}
			}
		});

		//### simple calculator (6) ###
		new Vue({
			el: "#sim_cal",
			data:{
				a: 0,
				b: 0,
				c: 0,
				operator: '+',
			},
			methods: {
				calculate: function(event){

					//event.preventDefault();

					switch (this.operator){
					case "+":
					this.c = this.a + this.b
					break;
					case "-":
					this.c = this.a - this.b
					break;
					case "*":
					this.c = this.a * this.b
					break;
					case "/":
					this.c = this.a / this.b
					break;
					}
				}
			}
		});
	</script>
</body>
</html>