<template>
	<div id="mobile_menu">
		<a class="menuLink" id="btn_show_menu" href="javascript:void(0)" v-on:click="showMenu" v-if="menu">
			<img src="../../../assets/images/icons/btn_close.svg" alt="menu">
		</a>
		<a class="menuLink" id="btn_show_menu" href="javascript:void(0)" v-on:click="showMenu" v-else>
			<img src="../../../assets/images/icons/btn_menu.svg" alt="menu">
		</a>
		<transition name="top_menu">
			<nav id="topmenu_mobile" v-if="menu">
				<ul id="menu_mobile">
					<li class="menuItem_mobile">
						<router-link to="/" tag="a" class="menuLink_mobile">Home</router-link>
					</li>
					<li class="menuItem_mobile">
						<router-link to="/" tag="a" class="menuLink_mobile">My Blogs</router-link>
					</li>
					<li class="menuItem_mobile">
						<a href="#contact_item" class="menuLink_mobile">Contact</a>
					</li>
				</ul>
				<div id="btn_downloadCV">
					<button type="button" class="btn btn-success">DOWNLOAD MY FULL CV</button>
				</div>
			</nav>
		</transition>
	</div>
</template>

<script type="text/javascript">
	export default {
		data() {
			return{
				menu: false
			}
		},
		methods: {
			showMenu: function(){
				this.menu = !this.menu;
			} 
		}
	};
</script>

<style scoped>
	/*Begin: CSS transition for wrapper of menu mobile*/
	.top_menu-enter{
		max-height: 0px;
	}
	.top_menu-enter-active{
		-webkit-transition: max-height 1s;
		-moz-transition: max-height 1s;
		-o-transition: max-height 1s;
		transition: max-height 1s;
	}
	.top_menu-enter-to{
		max-height: 300px;
	}
	.top_menu-leave{
		max-height: 300px;
	}
	.top_menu-leave-active{
		-webkit-transition: max-height 1s;
		-moz-transition: max-height 1s;
		-o-transition: max-height 1s;
		transition: max-height 1s;
	}
	.top_menu-leave-to{
		max-height: 0px;
	}
	/*Begin: CSS transition for wrapper of menu mobile*/

	#btn_show_menu{
		display: none;
	}

	#topmenu_mobile{
		background-color: #fff;
		padding: 10px 0px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-content: center;
	}

	#mobile_menu{
		width: 100%;
		background-color: aliceblue;
		z-index: 3;
		position: fixed;
		left: 0;
	}

	.menuLink_mobile{
		text-decoration: none;
		color: #000;
	}

	.menuLink_mobile:hover {
		text-decoration: none;
		color: coral;
		position: relative;
	}

	#menu_mobile{
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-content: center;
		padding: 0;
	}

	.menuItem_mobile{
		height: 30px;
	}

	@media screen and (max-width: 560px){
		#btn_show_menu{
			display: block;
		}
	}
</style>