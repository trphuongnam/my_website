<template>
	<div id="map">
		<div id="map_element">
			<div class="title-element title_left"><h3>MY LOCATION</h3></div>
			<iframe id="google_map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7539.4207779382!2d108.14195853392475!3d16.06919064831486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142192ab0d19c39%3A0x342a4cea522ddf67!2zMDYgxJBvw6BuIFBow7ogVOG7qSwgSG_DoCBLaMOhbmggQuG6r2MsIExpw6puIENoaeG7g3UsIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1637925037179!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
	</div>
</template>

<script type="text/javascript">
	
</script>

<style scoped>
#map{
  grid-row: 7/8;
  grid-column: 1/4;
  padding-top: 10px;
  background-color: #fff;
  z-index: 0;
}

#map_element{
	display: grid;
	grid-template-columns: 1fr 3fr 1fr;
	grid-template-rows: minmax(auto, auto) 4fr;
}

#google_map{
	grid-column: 1/4;
	grid-row: 2/3;
}
</style>