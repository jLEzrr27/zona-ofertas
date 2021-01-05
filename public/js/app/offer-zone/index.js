const submitShareOffer = () => {
    const {
        your_name,
        friend_name,
        friend_email,
    } = {
        your_name: document.querySelector("#your_name").value,
        friend_email: document.querySelector("#friend_name").value,
        friend_email: document.querySelector("#friend_email").value
    }

    let formData = new FormData();

    formData.append("your_name", your_name);
    formData.append("friend_name", friend_name);
    formData.append("friend_email", friend_email);

    axios.post("share-offer", formData).then(x => {
        const res = x.data;

        console.log(res);
    });

};

document.getElementById("btn_share_offer").onclick = function() {submitShareOffer()};