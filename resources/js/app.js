
import Vue from 'vue';
import Message from './components/Message.vue';
import Avatar from './components/Avatar.vue';
import MessageForm from './components/MessageForm.vue';

Vue.component('user-avatar', Avatar);
Vue.component('message-block', Message);
Vue.component('message-form', MessageForm);

const app = new Vue({
	el: "#app"
})

function scrollBot (el) {
	el.scrollTop = el.scrollHeight;
}

function show_toast(type, message) {
	let el = $('#'+type+'Toast')[0].cloneNode(true);
	$(el).find('.toast-body').text(message);
	$(el).on('hidden.bs.toast', (e)=>{
		e.target.remove();
	});
	$('.toast-container')[0].appendChild(el);
	new bootstrap.Toast(el).show();
}

function show_form_error(form, msg) {
	a = $(form).find('.alert');
	a.text(msg);
	a.removeClass('d-none');
}

$('.msg_form textarea').keypress(function (e) {
	if(e.which === 13 && !e.shiftKey) {
			e.preventDefault();
			$(this).closest("form").submit();
	}
})

$('.msg_form').on('submit', (e)=>{
	e.preventDefault();
	var fd = new FormData(e.target);
	$(e.target).find('textarea').val('');
	let Msg = Vue.extend(Message);
	let msg = new Msg();
	msg.$mount();
	msg.text = fd.get('text');
	msg.avatar = user.avatar;
	msg.name = user.name;
	let msgs = document.querySelector('.messages');
	msgs.appendChild(msg.$el);
	scrollBot(msgs);
	$.ajax({
		type: "post",
		url: e.target.getAttribute('action'),
		data: fd,
		processData: false,
		contentType: false,
		success: function (response) {
			console.log(response)
		},
		error: function(xhr, s, t) {
			show_toast('danger', xhr.messageJson['message']);
		}
	});
})

$('.auth_form').submit((e)=>{
	e.preventDefault();
	let fd = new FormData(e.target);
	$.ajax({
		type: e.target.getAttribute('method'),
		url: e.target.getAttribute('action'),
		data: fd,
		processData: false,
		contentType: false,
		success: function (response) {
			if (response['success']) {
				show_toast('succ', response['message']);
				document.location.reload();
			} else {
				show_form_error(e.target, response['message']);
			}
		},
		error: function(xhr, s, t) {
			show_form_error(e.target, xhr.messageJson['message']);
		}
	});
})

if (messages != null) {
	messages.forEach(element => {
		show_toast(element[0], element[1]);
	});
}

scrollBot($('.messages')[0]);