var url_string = window.location.href;
var url = new URL(url_string);
var idUsuario = url.searchParams.get("idUsuario");
console.log(idUsuario);


function getUserCode(){
    $.get("phps/getClientCode.php?idUsuario=" + idUsuario, function(data, status){
        codigo = String(data);
        
        $('#codigo').text(codigo);
    
        jQuery('#qrcode').qrcode({
	        text	: codigo ,
	        width   : "200",
	        height  : "200"
        })
    });
}
getUserCode();