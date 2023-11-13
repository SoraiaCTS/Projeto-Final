function verifyCPF(cpf) {
    const rgx = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/
    return rgx.test(cpf)
}

function verifyTEL(telefone) {
    const rgx = /^\d{5}-\d{4}$/
    return rgx.test(telefone)
}

function submitForm() {
    let nome = document.getElementById("nome").value
    let email = document.getElementById("email").value
    let cpf = formatCPF(document.getElementById("cpf").value)
    let telefone = formatTEL(document.getElementById("telefone").value)
    let formacao = document.getElementById("formacao").value

    if(nome.trim() == "" || email.trim() == "" || cpf == "" || telefone == "" || formacao == "") {
        alert("Digite um Nome/Email/CPF/Telefone/Formação válido.")
        return
    }

    if(verifyCPF(cpf) && (verifyTEL(telefone))) {
        alert("O CPF e telefone de " + nome + " é válido")
    }
    else {
        alert("O CPF de " + nome + " é inválido")
    }
} 

function formatCPF(cpf) {
    return cpf.trim().replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4")
}

function maskCPF(input){
    let cpf = input.value
    
    if(isNaN(cpf[cpf.length - 1])){
       input.value = cpf.substring(0, cpf.length-1)
       return
    }
    
    input.setAttribute("maxlength", "14")
    if (cpf.length == 3 || cpf.length == 7) input.value += "."
    if (cpf.length == 11) input.value += "-"
 }

 function formatTEL(telefone) {
    return telefone.trim().replace(/(\d{5})(\d{4})/, "$1-$2")
}

 function maskTEL(input){
    let telefone = input.value
    
    if(isNaN(telefone[telefone.length - 1])){
       input.value = telefone.substring(0, telefone.length-1)
       return
    }
    
    input.setAttribute("maxlength", "10")
    if (telefone.length == 5) input.value += "-"
 }
 