const inputs = document.querySelectorAll('input');

console.log(inputs);

// regex patterns
const patterns = {
    'first_name': /^[a-zA-Z]{1,20}$/,
    'last_name': /^[a-zA-Z]{1,20}$/,
    'email': /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
    'password': /^[a-z\d-]{8,20}$/

};

inputs.forEach((input) => {
        input.addEventListener("keyup", (e) => {
        if(patterns[e.target.name].test(e.target.value)) {
            if(e.path[1].classList.contains("has-error")) {
                e.path[1].classList.remove("has-error");
                e.path[1].classList.add("has-success");
            } else {
                e.path[1].classList.add("has-success");
            } 
        } else {
            if(e.path[1].classList.contains("has-success")) {
                e.path[1].classList.remove("has-success");
                e.path[1].classList.add("has-error");
            } else {
                e.path[1].classList.add("has-error");
            }   
        }
    });
});