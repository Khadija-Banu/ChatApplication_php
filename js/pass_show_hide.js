const pswrdField=document.querySelector(".container input[type='password']");
const toggleIcon= document.querySelector(".container .icon i");

toggleIcon.onclick= ()=>{
    if(pswrdField.type==="password"){
        pswrdField.type="text";
        toggleIcon.classList.add("active");
    }
    else{
        pswrdField.type==="password";
        toggleIcon.classList.remove("active");
    }
}