<template>
	<div id="project">
		<div class="project_element">
			<div class="title-element"><h3>PROJECTS</h3></div>
			<div class="project_container">
				<div class="project_item" v-for="project in projects" v-bind:key="project.id">
					<div class="project_item_image">
						<img :src="project.image">
					</div>
					<div class="project_item_info">
						<h3>{{project.name}}</h3>
						<p class="project_desc paragraph">{{project.description}}</p>
						<p class="date_time paragraph">Start time: {{project.time_start}}</p>
						<p class="date_time paragraph">End time{{project.time_end}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default{
		data() {
			return {
				projects:[
					{
						image: "https://img.icons8.com/color/100/000000/html-5--v1.png",
						name: "EESCons",
						url:"",
						time_start:"11/9/2020",
						time_end:"11/10/2020",
						description:"Website gioi thieu cong ty"			
					},
					{
						image: "https://img.icons8.com/color/100/000000/html-5--v1.png",
						name: "EESCons",
						url:"",
						time_start:"11/9/2020",
						time_end:"11/10/2020",
						description:"Website gioi thieu cong ty"			
					},
					{
						image: "https://img.icons8.com/color/100/000000/html-5--v1.png",
						name: "EESCons",
						url:"",
						time_start:"11/9/2020",
						time_end:"11/10/2020",
						description:"Website gioi thieu cong ty"			
					}
				]
			}
		}

	}
</script>
<style scoped>
	#project{
		grid-row: 5/6;
		grid-column: 1/4;
		border: 0px solid #fff;
		display: flex;
		z-index: 0;
		background-color: #fff;
	}

	.project_element{
		display: grid;
		grid-template-columns: 1fr 3fr 1fr;		
		grid-template-rows: minmax(auto, auto) 4fr;
		width: 100%;
	}

	.project_container{
		grid-row: 2/3;
		grid-column: 1/4;
		padding: 0px 10px 10px;
		display: flex;
		justify-content: space-around;
		flex-wrap: wrap;
	}

	.project_item{
		width: 40%;
		height: 200px;
		margin-bottom: 20px;
		display: grid;
		grid-template-columns: 1fr 2fr;
		grid-template-rows: 1fr;
		background-color: #e9e4e4db;
		padding: 10px;
	}

	.project_item_image{
		width: 100%;
		height: 100%;
	}
	.project_item_info{
		width: 100%;
		height: 100%;
		text-align: left;
		padding: 0px 10px;
	}
</style>