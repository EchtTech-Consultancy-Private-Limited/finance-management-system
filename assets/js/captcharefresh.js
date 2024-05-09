function refreshCaptcha(){
	var baseURL = $("meta[name='baseURL']").attr('content');
	$.ajax({
        url: baseURL+'captcha', // URL to the server-side script
        type: 'GET',
        success: function(newImageUrl) {
            // Update captcha image source
            $('#captchaimg').attr('src', baseURL+'captcha');
        },
        error: function(xhr, status, error) {
            console.error('Error refreshing captcha:', error);
        }
    });
	
}