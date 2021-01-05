/*Función para enviar por axios los datos al correo */
const submitShareOffer = () => {
    const {/*Recogemos los valores de los input del formulario usando los id*/
        your_name,
        friend_name,
        friend_email,
    } = {
        your_name: document.querySelector("#your_name").value,
        friend_name: document.querySelector("#friend_name").value,
        friend_email: document.querySelector("#friend_email").value
    }

    /*Validamos que se ingresen todos los campos*/
    if(your_name == "" || friend_name == "" || friend_email == ""){
        $(".top-message").show(250);
        $(".inside-message").html("Todos los campos son requeridos!")
        $(".inside-message").addClass("bg-danger");
        setTimeout(function(){
            $(".top-message").hide(250); $(".inside-message").text(""); $(".inside-message").removeClass("bg-danger")
        }, 3000);
        return 1;
    }

    let formData = new FormData();
    formData.append("your_name", your_name);
    formData.append("friend_name", friend_name);
    formData.append("friend_email", friend_email);

    showGifAndEditButton("show");

    /*con Axios enviamos la petición  POST al controlador por la ruta */
    axios.post("share-offer", formData)
    /*En caso de fallar el envío de correos, ya sea por credenciales malas en el .env u otra razón*/
    .catch(function (error) {
        if (error.response) {
            showGifAndEditButton("hide");
            if(error.response.status != 200){
                $(".top-message").show(250);
                $(".inside-message").html("<b>"+error.response.data.statusText+":</b> "+error.response.data.message);
                $(".inside-message").addClass("bg-danger");
                setTimeout(function(){
                    $(".top-message").hide(250); $(".inside-message").text(""); $(".inside-message").removeClass("bg-danger")
                }, 3000);
            }
        }
    })
    .then(res => {
        if(res != undefined){
            /*Independientemente de la respuesta que retorne el con */
            const r = res.data;

            if(r != undefined)
            {

                $(".top-message").show(250);
                $(".inside-message").text(r.message);
                $(".inside-message").addClass("bg-"+r.status); 
    
                showGifAndEditButton("hide");
                
                setTimeout(function(){
                    $(".top-message").hide(250); $(".inside-message").text(""); $(".inside-message").removeClass("bg-"+r.status)
                }, 2000);
    
                return 1;
            }
        }
    });

};

const showGifAndEditButton = (param) => {/*Con esta función escodemos/mostramos el gif de envío de correo y editamos el contet del boton enviar */
    if(param == "show"){
        document.getElementById("btn_share_offer").textContent = "Compartiendo oferta...";
        document.getElementById("btn_share_offer").disabled = true;
        document.getElementById("gif_send_email").style.display = "block";
    }else{
        document.getElementById("btn_share_offer").textContent = "Enviar";
        document.getElementById("btn_share_offer").disabled = false;
        document.getElementById("gif_send_email").style.display = "none";

    }
};

document.getElementById("btn_share_offer").onclick = function() {submitShareOffer()};