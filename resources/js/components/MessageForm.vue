<template>
	<form class="msg_form border-top" :action="action" method="POST">
		<input type="hidden" name="_token" :value="token">
		<input type="hidden" name="pid" :value="pid">
		<div class="row p-3">
			<div class="col textfield">
				<textarea name="text" class="form-control" style="max-height: 150px"></textarea>
			</div>
			<div class="col-sm-auto btns">
				<div class="row">
					<button type="submit" class="btn btn-dark">Отправить</button>
				</div>
			</div>
		</div>
	</form>
</template>

<script>
export default {
	props: ['pid', 'token', 'action']
}
</script>
	
<style>

</style>