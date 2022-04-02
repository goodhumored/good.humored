<template>
	<div class="col-sm-auto"> 
			<img class="rounded-circle" height="32" width="32"
			:src="src" alt="avatar">
	</div>
</template>

<script>
export default {
	name: "Avatar",
	props: ['src']
}
</script>

<style>

</style>