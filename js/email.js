function validaForm(frm) {
    /*
    o parâmetro frm desta função significa: this.form,
    pois a chamada da função - validaForm(this) foi
    definida na tag form.
    */
    //Verifica se o campo nome foi preenchido e
    //contém no mínimo três caracteres.
    if(frm.nome.value === "" || frm.nome.value == null || frm.nome.value.length < 3) {
    //É mostrado um alerta, caso o campo esteja vazio.
    alert("Por favor, indique o seu nome.");
    //Foi definido um focus no campo.
    frm.nome.focus();
    //o form não é enviado.
    return false;
    }

    //o campo e-mail precisa de conter: "@", "." e não pode estar vazio
    if(frm.email.value.indexOf("@") === -1 ||
        frm.email.valueOf.indexOf(".") === -1 ||
        frm.email.value === "" ||
        frm.email.value == null) {
        alert("Por favor, indique um e-mail válido.");
        frm.email.focus();
        return false;
    }

    //Valida o select sobre o assunto desejado
    if(frm.ass.option[frm.ass.selectedIndex].value === "") {
        alert("Por favor, coloque um assunto para podermos sanar sua dúvida melhor.");
        frm.ass.focus();
        return false;
    }

    //Valida a textArea, que é como validar um campo de texto simples.
    if(frm.conteudo.value === "" || frm.conteudo.value == null) {
        alert("Por favor, coloque algum conteúdo para sanar sua dúvida melhor.");
        frm.conteudo.focus();
        return false;
    }
}
