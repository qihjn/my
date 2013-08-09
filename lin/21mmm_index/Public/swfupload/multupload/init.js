		var swfu;
		var utype = "person";
		var swfuploadInit = function() {
			var settings = {
				flash_url : jsPublic + "/swfupload/swfupload.swf",
				flash9_url : jsPublic + "/swfupload/swfupload_fp9.swf",
				upload_url: jsImg + "swfupload/upload_limit.php",
				
				post_params: {"model" : document.getElementById("model").value,"type":document.getElementById("swftype").value,"thumb":document.getElementById("thumb").value,"utype":document.getElementById("swfutype").value,"limit":5},
				file_size_limit : "100 MB",
				file_types : "*.jpg;*.jpeg;*.gif",
				file_types_description : "All Files",
				file_post_name: "Filedata",
				file_upload_limit : 100,
				file_queue_limit : 5,
				custom_settings : {
					progressTarget : "fsUploadProgress",
					cancelButtonId : "btnCancel"
				},
				debug: true,

				// Button settings
				button_image_url: jsPublic + "/swfupload/TestImageNoText_65x29.png",
				button_width: "65",
				button_height: "29",
				button_placeholder_id: "spanButtonPlaceHolder",
				button_text: '<span class="theFont">上传</span>',
				button_text_style: ".theFont { font-size: 16; }",
				button_text_left_padding: 12,
				button_text_top_padding: 3,
				
				// The event handler functions are defined in handlers.js
				swfupload_preload_handler : preLoad,
				swfupload_load_failed_handler : loadFailed,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete
			};

			swfu = new SWFUpload(settings);
			
		};