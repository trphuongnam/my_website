<template>
	<div class="box_container_info">
		<div class="infomation_content" v-if="contentLength > 1">
			<section class='info_text_content' v-for="(textContent) in arrTextContent" v-bind:key="textContent.id" v-html="textContent.text">
			
			</section>	
		</div>
		<div class="infomation_content" v-else>
			<section class='info_text_content'>
				{{content}}
			</section>	
		</div>
		
	</div>
</template>

<script type="text/javascript">
	export default {
		props: {
			content: String
		},
		data(){
			return {
				contentLength: 1,
				arrTextContent: []
			}
		},
		beforeMount() {
			this.checkLengthContent(this.content);
		},
		methods: {
			checkLengthContent: function(content) {
				var arrayText = content.split("&curren;");
				this.contentLength = arrayText.length;
				if(arrayText.length > 1){
					this.showContent(arrayText)
				}
			},
			showContent: function (arrayText) {
				for (var i = 0; i < arrayText.length; i++) {
					this.arrTextContent[i] = ({text: arrayText[i]});
				}
				console.log("arrTextContent");
				console.log(this.arrTextContent);
			}
		},
	}
</script>

<style type="text/css">
.info_text_content{
	width: 100%; 
	height:200px; 
	padding: 20px; 
	display: flex; 
	justify-content: center; 
	align-items: center
}

.infomation_content {
  display: flex;
  flex-direction: row;
  align-items: center;
  text-align: justify;
  justify-content: space-around;
}

@media only screen and (max-width: 650px) {
	.infomation_content {
		flex-direction: column;
	}

	.info_text_content{
		width: 100%;
	}
}
</style>