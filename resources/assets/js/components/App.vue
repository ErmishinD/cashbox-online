<template>
	<div>
		<p>
			<router-link :to="{name: 'home'}">Home</router-link>
			<router-link :to="{name: 'reports_casbox_create'}">reports_casbox_create</router-link>
		</p>

		<div>
			<router-view></router-view>
		</div>
	</div>
	
</template>