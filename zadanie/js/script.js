$('.btn_sign_up').on('click',function(){
var data = {
		"First_name": $('.first_name').val(),
		"Last_name": $('.last_name').val(),
		"Email":$('.Email_up').val(),
		"Password":$('.Password_up').val() 
}

json =  JSON.stringify(data)
 var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://zadanie/regestration/reg.php",
  "method": "POST",
    "headers": {
    "content-type": "application/json",

  },
  "processData": false,
  "data": json
}
$.ajax(settings).done(function (response) {
	  alert(JSON.stringify(response))
})
})

//////////////////////////////////////////

$('.add_task').on('click',function(){
var data = {
    "title": $('.title').val(),
    "description": $('.description').val()
}

json =  JSON.stringify(data)
 var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://zadanie/api/Add_task.php",
  "method": "POST",
    "headers": {
    "content-type": "application/json",

  },
  "processData": false,
  "data": json
}
$.ajax(settings).done(function (response) {
  alert(JSON.stringify(response))
})
})

///////////////////////////////////////////

$('.done').on('click',function(){
var data = {
    "task_id": $(this).attr('data-id')
}

json =  JSON.stringify(data)
 var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://zadanie/api/Done_task.php",
  "method": "POST",
    "headers": {
    "content-type": "application/json",

  },
  "processData": false,
  "data": json
}
$.ajax(settings).done(function (response) {
  alert(JSON.stringify(response))
})
})

/////////////////////////////////////////////

$('.op_task_tune').on('click',function(){
var data = {
    "task_id": $(this).attr('data-id'),
    "title": $("#task_title"+$(this).attr('data-id')).val(),
    "description": $("#task_description"+$(this).attr('data-id')).val(),
}

json =  JSON.stringify(data)
 var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://zadanie/api/Tune_task.php",
  "method": "POST",
    "headers": {
    "content-type": "application/json",

  },
  "processData": false,
  "data": json
}
$.ajax(settings).done(function (response) {
  alert(JSON.stringify(response))
})
})

////////////////////////////////////////////

$('.btn_gived').on('click',function(){
var data = {
    "task_id": $(this).attr('data-task-id'),
    "user_id": $(this).attr('data-user-id'),
}

json =  JSON.stringify(data)
 var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://zadanie/api/Send_task.php",
  "method": "POST",
    "headers": {
    "content-type": "application/json",

  },
  "processData": false,
  "data": json
}
$.ajax(settings).done(function (response) {
  alert(JSON.stringify(response))
})
})

////////////////////////////////////////////

$('.op_task_delete').on('click',function(){
var data = {
    "task_id": $(this).attr('data-id'),
}

json =  JSON.stringify(data)
 var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://zadanie/api/Delete_tasks.php",
  "method": "POST",
    "headers": {
    "content-type": "application/json",

  },
  "processData": false,
  "data": json
}
$.ajax(settings).done(function (response) {
  alert(JSON.stringify(response))
})
})

